<?php

namespace App\Models;

use http\QueryString;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use function Symfony\Component\String\length;

class post extends Model
{
    use HasFactory;
    protected $table='posts';
    public $timestamps=true;
    use SoftDeletes;
    protected $fillable=[
        'UserID_Set_Post',
        'title',
        'body'
    ];
    protected static function CheckPostIsTrashed($post_trashed,$count_trashed, $id_post_checked){
        $flag_id=false;
        for($i=0; $i<$count_trashed; $i++){
            if(($post_trashed[$i]->id)==$id_post_checked){
                $flag_id=true;
            }
        }
        return $flag_id;
    }
}
