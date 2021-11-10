<?php

namespace App\Imports;

use App\Servis;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ServisImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function transformDate($value, $format = 'd-m-Y')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if (!isset($row['servis_id'])) {
                return null;
            }

            Servis::updateOrCreate([
                'id' => $row['servis_id'],
            ], [
                'id' => $row['servis_id'],
                'user_id' => $row['user_id'],
                'tgl_in' => $this->transformDate($row['tgl_in']),
                'no_tanda_terima' => $row['no_tanda_terima'],
                'nama_customer' => $row['nama_customer'],
                'email' => $row['email'],
                'no_hp_customer' => $row['no_hp'],
                'dept' => $row['dept'],
                'tgl_beli' => $this->transformDate($row['tgl_beli']),
                'type' => $row['type'],
                'serial_num' => $row['serial_number'],
                'kelengkapan' => $row['kelengkapan'],
                'kerusakan' => $row['kerusakan'],
                'tehnisi' => $row['tehnisi'],
                'tgl_kirim_vendor' => $this->transformDate($row['tgl_kirim_vendor']),
                'vendor' => $row['vendor'],
                'no_surat_jalan' => $row['no_surat_jalan'],
                'tgl_kembali_vendor' => $this->transformDate($row['tgl_kembali_vendor']),
                'status_unit' => $row['status_unit'],
                'tgl_ambil_cust' => $this->transformDate($row['tgl_ambil_customer']),
                'status' => $row['status'],
                'closed_by' => $row['closed_by'],
                'charge' => $row['charge'],
                'no_nota' => $row['no_nota'],
                'nominal' => $row['nominal'],
                'usia_service' => $row['usia_service'],
                'cek_7' => $row['7'],
                'cek_14' => $row['14'],
                'cek_30' => $row['30'],
                'tindakan' => $row['tindakan'],
                'ket_1' => $row['keterangan_1'],
                'ket_2' => $row['keterangan_2'],
                'ket_3' => $row['keterangan_3'],
            ]);
        }
    }
}
