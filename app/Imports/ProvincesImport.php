<?php

namespace App\Imports;

use App\Province;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class ProvincesImport implements ToModel, WithHeadingRow, WithProgressBar
{
    use Importable;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if(!Province::where('id', $row['oblast'])->exists()) {
            return new Province([
                'id'     => $row['oblast'],
                'name'   => $row['name'],
            ]);
        }
    }

}
