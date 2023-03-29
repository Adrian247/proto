<?php

namespace App\Console\Commands;

use Artisan;
use Database\Seeders\InitSeeder;
use Illuminate\Console\Command;

class StartProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:start-project';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Inicializar proyecto, ejecutar migraciones y seeders';

    /**
     * Execute the console command.
     * @return int
     */
    public function handle(): int
    {
        if ($this->confirm('¿Desea inicializar el proyecto?', true)) {
            Artisan::call('migrate');
            $this->info('Migraciones: OK!');
            $this->call(InitSeeder::class);
            $this->info('Seeders: OK!');
            $this->info('Recuerde inicializar los servicios');
            $this->info('sail: vendor/bin/sail up');
            $this->info('npm: vendor/bin/sail npm run dev');
            $this->info('Todo ok, a picar código nerd! ✍️(◔◡◔)');
        }
        return Command::SUCCESS;
    }
}
