<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Kelas;


class KelasImport implements ToCollection, WithHeadingRow
{

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Kelas::updateOrCreate([
                'id' => $row['nomor'],
            ], [
                'kode_matkul' => $row['kode'],
                'nama_matkul' => $row['matakuliah'],
                'grup' => $row['grup'],
                'sifat' => $row['sifat'],
                'sks' => $row['sks'],
                'jumlah_mhs' => $row['jumlah_mahasiswa'],
                'tahun_ajaran' => $row['tahun_ajaran'],
                'semester' => $row['semester'],
                'jumlah_dosen' => $row['jumlah_dosen'],
            ]);
        }
    }
}
