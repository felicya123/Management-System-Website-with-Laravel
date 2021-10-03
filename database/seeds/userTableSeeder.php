<?php


use Illuminate\Database\Seeder;
use App\User;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            "user_id" => "pms_user",
            "fullname" => "User",
            "division" => "User",
            "dob" => "2019-11-25",
            "gender" => "Male",
            "email" => "user@mail.com",
            "password" => bcrypt("12345678"),
            "address" => "asd"
        ]);

        User::create([
            "user_id" => "pms_itba",
            "fullname" => "IT BA",
            "division" => "IT_BA",
            "dob" => "2019-11-25",
            "gender" => "Female",
            "email" => "it_ba@mail.com",
            "password" => bcrypt("12345678"),
            "address" => "asd"
        ]);

        User::create([
            "user_id" => "pms_itbahead",
            "fullname" => "IT BA Head",
            "division" => "IT_BAHead",
            "dob" => "2019-11-25",
            "gender" => "Female",
            "email" => "it_ba_head@mail.com",
            "password" => bcrypt("12345678"),
            "address" => "asd"
        ]);

        User::create([
            "user_id" => "pms_itsecurity",
            "fullname" => "IT Security",
            "division" => "IT_Security",
            "dob" => "2019-11-25",
            "gender" => "Female",
            "email" => "it_security@mail.com",
            "password" => bcrypt("12345678"),
            "address" => "asd"
        ]);

        User::create([
            "user_id" => "pms_skmr",
            "fullname" => "SKMR",
            "division" => "SKMR",
            "dob" => "2019-11-25",
            "gender" => "Female",
            "email" => "skmr@mail.com",
            "password" => bcrypt("12345678"),
            "address" => "asd"
        ]);

        User::create([
            "user_id" => "pms_skk",
            "fullname" => "SKK",
            "division" => "SKK",
            "dob" => "2019-11-25",
            "gender" => "Female",
            "email" => "skk@mail.com",
            "password" => bcrypt("12345678"),
            "address" => "asd"
        ]);

        User::create([
            "user_id" => "pms_tsa",
            "fullname" => "IT SA",
            "division" => "IT_SA",
            "dob" => "2019-11-25",
            "gender" => "Female",
            "email" => "it_sa@mail.com",
            "password" => bcrypt("12345678"),
            "address" => "asd"
        ]);

        User::create([
            "user_id" => "pms_developer",
            "fullname" => "IT Developer",
            "division" => "IT_Developer",
            "dob" => "2019-11-25",
            "gender" => "Female",
            "email" => "it_developer@mail.com",
            "password" => bcrypt("12345678"),
            "address" => "asd"
        ]);

        User::create([
            "user_id" => "pms_itinfra",
            "fullname" => "IT Infra",
            "division" => "IT_Infra",
            "dob" => "2019-11-25",
            "gender" => "Female",
            "email" => "it_infra@mail.com",
            "password" => bcrypt("12345678"),
            "address" => "asd"
        ]);

        User::create([
            "user_id" => "pms_itam",
            "fullname" => "IT AM",
            "division" => "IT_AppsManager",
            "dob" => "2019-11-25",
            "gender" => "Female",
            "email" => "it_am@mail.com",
            "password" => bcrypt("12345678"),
            "address" => "asd"
        ]);

        User::create([
            "user_id" => "pms_itowner",
            "fullname" => "IT Owner",
            "division" => "IT_Owner",
            "dob" => "2019-11-25",
            "gender" => "Female",
            "email" => "it_owner@mail.com",
            "password" => bcrypt("12345678"),
            "address" => "asd"
        ]);

        User::create([
            "user_id" => "pms_itpmo",
            "fullname" => "IT PMO",
            "division" => "IT_PMO",
            "dob" => "2019-11-25",
            "gender" => "Female",
            "email" => "it_pmo@mail.com",
            "password" => bcrypt("12345678"),
            "address" => "asd"
        ]);

        User::create([
            "user_id" => "pms_bo",
            "fullname" => "Business Owner",
            "division" => "BO",
            "dob" => "2019-11-25",
            "gender" => "Female",
            "email" => "bo@mail.com",
            "password" => bcrypt("12345678"),
            "address" => "asd"
        ]);
        
        User::create([
            "user_id" => "pms_admin",
            "fullname" => "User Admin",
            "division" => "Admin",
            "dob" => "2019-11-25",
            "gender" => "Male",
            "email" => "admin@mail.com",
            "password" => bcrypt("12345678"),
            "address" => "asd"
        ]);
    }
}
