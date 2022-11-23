<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class login_user_admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Schema::disableForeignKeyConstraints();
        \App\Models\login_user_admin::truncate();
        Schema::enableForeignKeyConstraints();
        $count_user=DB::table('Admin_users')
                ->select('*')
                ->get()
                ->count();
//        dd($count_user);
        $i=1;
        while($i<=$count_user){
            $sel_uer=DB::table('Admin_users')
                ->select('surname','name')
                ->where('id','=',$i)
                ->get();
            $sel_uer=json_decode($sel_uer, true);
//            dd(var_dump($sel_uer[0]["surname"]));
//            dd(str_split($sel_uer[0]["name"],3)[0]); find the first three charectar of string
            \App\Models\login_user_admin::insert(
                [
                    'user_id'=>$i,
                    'username'=>strtolower($sel_uer[0]["surname"].str_split($sel_uer[0]["name"],3)[0]),
                    'password'=>(random_int(123456,456789)),
                    'created_at'=>now(),
                    'updated_at'=>now()
                ]

            );// end insert
            $i+=1;
        }
    }
}
