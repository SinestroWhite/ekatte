<?php

namespace App\Console\Commands;

use App\Http\Controllers\ParseController;
use App\Imports\MunicipalitiesImport;
use App\Imports\MunicipalitiesUpdateImport;
use App\Imports\ProvincesImport;
use App\Imports\TownsImport;
use Illuminate\Console\Command;

class Import extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importing .xlsx files to the database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $this->output->title('Importing Provinces');
        (new ProvincesImport)->withOutput($this->output)->import('Ek_obl.xlsx');
        $this->output->success('Provinces have been Successfully imported!');

        $this->output->title('Importing Municipalities');
        (new MunicipalitiesImport)->withOutput($this->output)->import('Ek_obst.xlsx');
        $this->output->success('Municipalities have been Successfully imported!');

        $this->output->title('Importing Towns');
        (new TownsImport)->withOutput($this->output)->import('Ek_atte.xlsx');
        $this->output->success('Towns have been Successfully imported!');

//        $controller = new ParseController();
//        $controller->update();
//        $this->output->title('Updating Munici');
//        (new MunicipalitiesUpdateImport)->withOutput($this->output)->import('Ek_atte.xlsx');
//        $this->output->success('Towns have been Successfully imported!');
    }
}
