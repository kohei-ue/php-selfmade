<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Plan;
use App\Models\Like;
use Illuminate\Database\Eloquent\SoftDeletes;

class Login extends Model
{
    use HasFactory;
    use SoftDeletes;
    // public $timestamps = false;
    public function plans() {
        return $this->hasMany(Plan::class);
    }
    //多対多のリレーションを書く
    public function likes()
    {
        return $this->hasmany('App\Models\Like');
    }

    //この投稿に対して既にlikeしたかどうかを判別する
    // public function isLike($planId)
    // {
    //   return $this->likes()->where('plan_id',$planId)->exists();
    // }

    // //isLikeを使って、既にlikeしたか確認したあと、いいねする（重複させない）
    // public function like($planId)
    // {
    //   if($this->isLike($planId)){
    //     //もし既に「いいね」していたら何もしない
    //   } else {
    //     $this->likes()->attach($planId);
    //   }
    // }

    // //isLikeを使って、既にlikeしたか確認して、もししていたら解除する
    // public function unlike($planId)
    // {
    //   if($this->isLike($planId)){
    //     //もし既に「いいね」していたら消す
    //     $this->likes()->detach($planId);
    //   } else {
    //   }
    // }

    protected $table = "users";
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'created_at',
        'updated_at'
    ];
}