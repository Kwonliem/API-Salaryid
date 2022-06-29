<?php

use App\User;
use Illuminate\Database\Seeder;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user-> name = "Liem";
        $user-> email = "liem@gmail.com";
        $user-> password =Hash::make("liemyoesuf");
        $user->save();
    }
}
