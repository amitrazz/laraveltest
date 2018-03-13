<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
                    'name'      =>  'Amit kumar',
                    'email'     =>  'amit@gmail.com',
                    'password'  =>  bcrypt('password'),
                    'admin'     => 1
                ]);

                App\Profile::create([
                    'user_id'   => $user->id,
                    'avator'    =>  'uploads/profile/1.jpg',
                    'about'     =>  'A relationship is used to define relationships where a single model owns any amount of other models.',
                    'facebook'  => 'facebook.com',
                    'youtube'  => 'youtube.com',
                    'linkedin'  => 'linkedin.com'


                ]);
    }
}
