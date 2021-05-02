<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'full_name' => 'Admin',
            'email' => 'admin@fatecbeautyhairsalao.com.br',
            'cpf' => '00000000000',
            'cellphone' => '13999999999',
            'secret_question' => '',
            'secret_answer' => '',
            'function' => 'admin',
            'password' => md5('12345'),
        ]);
    }
}
