<?php

namespace Database\Seeders;

use App\Models\login_user;
use App\Models\reg_user;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use function Spatie\Ignition\Config\toArray;
use function Symfony\Component\Console\Style\table;
use function Symfony\Component\String\trimEnd;
use Illuminate\Support\Facades\DB;

class LoginUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
//        $sur_user=reg_user::pluck('surname');
//        $name_user=reg_user::pluck('name');
//        $username=$sur_user&&$name_user;
//        dd($username);
//        $user_id_reg=reg_user::pluck('id')->toArray();
//        $sur_user=reg_user::pluck('surname')->toArray();
//        $name_user=reg_user::pluck('name')->toArray();
        Schema::disableForeignKeyConstraints();
        login_user::truncate();
        Schema::enableForeignKeyConstraints();
        $count_user=DB::table('reg_users')
        ->select('*')
        ->get()
        ->count();
//        dd($count_user);
        $i=1;
        while($i<=$count_user){
            $sel_uer=DB::table('reg_users')
                ->select('surname','name')
                ->where('id','=',$i)
                ->get();
            $sel_uer=json_decode($sel_uer, true);
//            dd(var_dump($sel_uer[0]["surname"]));
//            dd(str_split($sel_uer[0]["name"],3)[0]); find the first three charectar of string
            login_user::insert(
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
