<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory,SoftDeletes; //72. soft deletes

    //36.
    protected $table='posts';

    //39.
    protected $fillable =['title','user_id','description','is_published','is_active','deleted_at']; //secure
    //protected $guarded = []; //not secure


    //79. 81.
    public function user(){

        return $this->belongsTo(User::class);
    }

}
