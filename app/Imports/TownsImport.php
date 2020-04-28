<?php

namespace App\Imports;

use App\Municipality;
use App\Town;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class TownsImport implements ToModel, WithHeadingRow, WithProgressBar
{
    use Importable;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if(!Town::where('id', $row['ekatte'])->exists() && $row['ekatte'] != "00000") {
            Municipality::find($row['obstina'])->update(['province_id' => $row['oblast']]);
            return new Town([
                'id'                => $row['ekatte'],
                'name'              => $row['name'],
                'type'              => $row['t_v_m'],
                'municipality_id'   => $row['obstina'],
            ]);
        }
    }
}
