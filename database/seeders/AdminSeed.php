<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Hash;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin =[
            'name' => 'admin',
            'email' => 'admin@gmal.com',
            'password' => Hash::make('admin12345'),
            'phone' => '01767740561',
        ];
        Admin::create($admin);
    }
}
