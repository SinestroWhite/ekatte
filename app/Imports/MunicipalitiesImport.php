<?php

namespace App\Imports;

use App\Municipality;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class MunicipalitiesImport implements ToModel, WithHeadingRow, WithProgressBar
{
    use Importable;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if(!Municipality::where('id', $row['obstina'])->exists()) {
            return new Municipality([
                'id'                => $row['obstina'],
                'name'              => $row['name'],
            ]);
        }
    }
}
