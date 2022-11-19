<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class comment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='comments';
    public $dates=['deleted_at'];
    protected $fillable=[
        'post_id',
        'user_id_comment',
        'body'
    ];

    public function show_comment()
    {
//        return $this->hasOne(post::class);
//        return comment::where('post_id',$id)->paginate(25);
        dd($this);
        return $this->hasMany(post::class,'id','post_id');
    }
    public Static function CheckTrashID($id_comment){
        $comment_trashed_count=comment::onlyTrashed()
            ->where('id',$id_comment)
            ->get()
            ->count();
        $comment_Not_trashed_count=comment::withoutTrashed()
            ->where('id',$id_comment)
            ->get()
            ->count();
        if($comment_trashed_count)
            return 1;
        if($comment_Not_trashed_count)
            return 2;

    }
}
