<?php

namespace App\Http\Controllers;

use App\Imports\MunicipalitiesImport;
use App\Imports\ProvincesImport;
use App\Imports\TownsImport;
use App\Province;
use App\Town;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ParseController extends Controller
{

    function import() {
//        $xlsx = new SimpleXLSX(Storage::url('file.txt'));
//        Excel::import(new ProvincesImport, 'Ek_obl.xlsx');
//        Excel::import(new MunicipalitiesImport, 'Ek_obst.xlsx');
//        Excel::import(new TownsImport, 'Ek_atte.xlsx');
//        dd(Storage::url('Ek_obl.xlsx'));
        return back();
    }


}
