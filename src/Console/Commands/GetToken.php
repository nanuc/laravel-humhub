<?php

namespace Nanuc\LaravelHumHub\Console\Commands;

use Illuminate\Console\Command;
use Nanuc\LaravelHumHub\Facades\HumHub;

class GetToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'humhub:token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets a token that can be used with the API';

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
        $this->info('Let\'s create a token for a HumHub user.');
        $username = $this->ask('User name');
        $password = $this->secret('User password');

        $login = HumHub::authentication()->login($username, $password);

        if(!$login) {
            $this->warn('Could not login to HumHub with the provided data.');
        }
        else {
            $this->info('Your token is ' . $login['token']);
        }
    }
}
