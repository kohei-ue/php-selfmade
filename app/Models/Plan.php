<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function user() {
        return $this->belongsTo(Login::class);
    }
    public function likes() {
        return $this->hasMany(Like::class);
    }
    /**
     * リプライにLIKEを付いているかの判定
    *
    * @return bool true:Likeがついてる false:Likeがついてない
    */
    public function is_liked_by_auth_user()
    {
        $id = Auth::id();

        $likers = array();
        foreach($this->likes as $like) {
        array_push($likers, $like->user_id);
        }

        if (in_array($id, $likers)) {
        return true;
        } else {
        return false;
        }
    }
    
    protected $table = "plans";
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'area',
        'date',
        'money',
        'traffic',
        'spot',
        'body',
        'image',
    ];
}