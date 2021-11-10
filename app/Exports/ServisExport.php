<?php

namespace App\Exports;

use App\Servis;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ServisExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Servis::all();
    }

    public function transformDate($value, $format = 'd-m-Y')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }

    public function map($servis): array
    {
        return [
             $servis->id,
             $servis->user_id,
             date('d/m/Y', strtotime($servis->tgl_in)),
             $servis->no_tanda_terima,
             $servis->nama_customer,
             $servis->no_hp_customer,
             $servis->dept,
             date('d/m/Y', strtotime($servis->tgl_beli)),
             $servis->type,
             $servis->serial_num,
             $servis->kelengkapan,
             $servis->kerusakan,
             $servis->tehnisi,
             date('d/m/Y', strtotime($servis->tgl_kirim_vendor)),
             $servis->vendor,
             $servis->no_surat_jalan,
             date('d/m/Y', strtotime($servis->tgl_kembali_vendor)),
             $servis->status_unit,
             date('d/m/Y', strtotime($servis->tgl_ambil_cust)),
             $servis->status,
             $servis->closed_by,
             $servis->charge,
             $servis->no_nota,
             $servis->nominal,
             $servis->usia_service,
             $servis->cek_7,
             $servis->cek_14,
             $servis->cek_30,
             $servis->tindakan,
             $servis->ket_1,
             $servis->ket_2,
             $servis->ket_3,
        ];
    }

    public function headings(): array
    {
        return [
            'SERVIS ID',
            'USER ID',
            'TANGGAL IN',
            'NO. TANDA TERIMA',
            'NAMA CUSTOMER',
            'NO HP',
            'DEPT ',
            'TANGGAL BELI',
            'TYPE',
            'SERIAL NUMBER',
            'KELENGKAPAN',
            'KERUSAKAN',
            'TEHNISI ',
            'TGL KIRIM VENDOR',
            'VENDOR',
            'NO. SURAT JALAN',
            'TGL KEMBALI VENDOR',
            'STATUS UNIT',
            'TGL AMBIL CUSTOMER ',
            'STATUS',
            'CLOSED BY',
            'CHARGE',
            'NO. NOTA',
            'NOMINAL',
            'USIA SERVIS ',
            '7',
            '14',
            '30',
            'TINDAKAN',
            'KETERANGAN 1',
            'KETERANGAN 2',
            'KETERANGAN 3',
        ];
    }
}
