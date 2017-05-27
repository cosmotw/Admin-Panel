<?php

namespace App\Console\Commands;

use App\Services\EmailService;
use Illuminate\Console\Command;

class ResetPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'password:reset {userEmail* : The email of the user} {--queue=default}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(EmailService $emailService)
    {
        parent::__construct();

        $this->emailService = $emailService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $emails = $this->argument('userEmail');

        $totalUnits = count($emails);
        $this->output->progressStart($totalUnits);
        foreach ($emails as $email) {
            $this->emailService->resetPassword($email);
            $this->output->progressAdvance();
        }
        $this->output->progressFinish();

        $this->info('Email send success.');
    }
}
