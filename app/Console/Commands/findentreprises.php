<?php

namespace App\Console\Commands;

use App\services\CompanyService;
use Illuminate\Console\Command;

class findentreprises extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'find:companies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'recherche les companies sur l\'api hubspot et les ajoutent a votre base de données';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //appelle mon services Company Service
        $this->call('migrate:refresh');

        (new CompanyService())->findCompanies();

        $this->output->success('companies and contacts has been retrieved successfully.');
    }
}
