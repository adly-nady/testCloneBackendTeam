<?php

namespace Database\Seeders;

use App\Models\exam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name'=>"Adly Nady",
            'phone'=>"01278933872",
            'email'=>"adly@task.com",
            'password'=>Hash::make('123456'),
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name'=>"Christina Atef",
            'phone'=>"01289587721",
            'email'=>"Christina@task.com",
            'password'=>Hash::make('123456'),
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name'=>"Mahmoud Besher",
            'phone'=>"01062047605",
            'email'=>"Mahmoud@task.com",
            'password'=>Hash::make('123456'),
            'created_at'=>date('Y-m-d H:i:s')
        ]);

        Exam::create([
            'title'=>"math exam one",
            'time'=>"one hour",
            'description'=>"math exam",
            'status'=>"Done",
            'user_id'=>3,
        ]);

        // DB::table('status')->insert([
        //     'name'=>"Panding",
        //     'icon'=>"icons/stopwatch.svg",
        //     "description"=>"Still working on it",
        //     "created_at"=>date('Y-m-d H:i:s')
        // ]);
        // DB::table('status')->insert([
        //     'name'=>"Defeat",
        //     'icon'=>"icons/sign-dead-end.svg",
        //     "description"=>"Failed to complete the task.",
        //     "created_at"=>date('Y-m-d H:i:s')
        // ]);
        // DB::table('status')->insert([
        //     'name'=>"Success",
        //     'icon'=>"icons/rocket-takeoff.svg",
        //     "description"=>"successfully completed the mission.",
        //     "created_at"=>date('Y-m-d H:i:s')
        // ]);
        // DB::table('departments')->insert([
        //     'name'=>"HR",
        //     'created_at'=>date('Y-m-d H:i:s')
        // ]);
        // DB::table('departments')->insert([
        //     'name'=>"IT",
        //     'created_at'=>date('Y-m-d H:i:s')
        // ]);
        // DB::table('departments')->insert([
        //     'name'=>"Markting",
        //     'created_at'=>date('Y-m-d H:i:s')
        // ]);

        // DB::table('tasks')->insert([
        //     'assign_from'=>"3",
        //     'assign_user'=>"1",
        //     'assign_status'=>"3",
        //     'assign_department'=>"2",
        //     'title'=>"Create API",
        //     'description'=>"Create API for this application and test it",
        //     'attachment'=>"['attachments/APIs.png','attachments/JWT.pdf']",
        //     'start_time'=>"2024-10-12 09:35:15",
        //     'end_time'=>"2024-10-14 09:35:15",
        //     'created_at'=>date('Y-m-d H:i:s')
        // ]);

    }
}
