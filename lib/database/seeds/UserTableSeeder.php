<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('123456'),
                'level'=>'1'
            ],
            [
                'email'=>'gatgong@gmail.com',
                'password'=>bcrypt('123456'),
                'level'=>'1'
            ],
            [
            'email'=>'ngocquang97bg@gmail.com',
            'password'=>bcrypt('123456'),
            'level'=>'1'
        ]
        ];
        DB::table('vp_users')->insert($data);
    }
}
