<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckNewCode_ForTest extends Controller
{
    //
    public function check_code()
    {
        $set_time=DB::table('post')
            ->where('id','=',1)
            ->update()
            ->toSQL();
        dd($set_time);
}
}
