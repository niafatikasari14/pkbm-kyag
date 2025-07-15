<?php

namespace App\Imports;

use App\Models\Alumni;
use Maatwebsite\Excel\Concerns\ToModel;

class AlumniImport implements ToModel
{
    public function model(array $row)
    {
        return new Alumni([
            'nama_alumni' => $row[0],
            'tahun_lulus' => $row[1],
            'program' => $row[2],
        ]);
    }
}

