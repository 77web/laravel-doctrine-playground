<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Entities\User;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    protected $signature = 'user:create {email}';

    public function __construct(
        private readonly EntityManagerInterface $em,
    ) {
        parent::__construct();
    }


    public function handle()
    {
        $user = new User();
        $user->email = $this->argument('email');
        $user->password = Hash::make('password');

        $this->em->persist($user);
        $this->em->flush();
    }
}
