<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class UserIndex extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:user-index';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info('Digital Plus :: Introdução ao Laravel / Lista de Usuários');

        $users = User::query()
            ->orderBy('id', 'desc')
            ->get();
        foreach ($users as $user) {
            $this->warn("{$user->id} - {$user->name} - {$user->email}");
        }
    }
}
