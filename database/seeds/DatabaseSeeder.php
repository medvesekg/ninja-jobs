<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
        DB::table('roles')->truncate();
        DB::table('c_v_s')->truncate();
        DB::table('logos')->truncate();
        DB::table('jobs')->truncate();
        DB::table('companies')->truncate();

        DB::table('roles')->insert([
            'name' => 'Iskalec zaposlitve'
        ]);
        DB::table('roles')->insert([
            'name' => 'Delodajalec'
        ]);

        factory(\App\Company::class, 8)->create()->each(function($company) {
            $company->user()->save(factory(\App\User::class)->make());
        });


        factory(\App\Job::class, 36)->create();


    }
}
