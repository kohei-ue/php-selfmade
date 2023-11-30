<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Plan;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;
    public function plans() {
        return $this->hasMany(Plan::class);
    }
    public function comments() {
      return $this->hasMany(Comment::class, 'user_id', 'id');
    }
    // public function liked_plans() {
    //     return $this->belongsToMany('App\Models\Plan', 'likes');
    // }
    //多対多のリレーションを書く
    public function likes()
    {
        return $this->belongsToMany('App\Models\Plan', 'likes', 'user_id', 'plan_id')->withTimestamps();
    }

    //この投稿に対して既にlikeしたかどうかを判別する
    public function isLike($planId)
    {
      return $this->likes()->where('plan_id',$planId)->exists();
    }

    //isLikeを使って、既にlikeしたか確認したあと、いいねする（重複させない）
    public function like($planId)
    {
      if($this->isLike($planId)){
        //もし既に「いいね」していたら何もしない
      } else {
        $this->likes()->attach($planId);
      }
    }

    //isLikeを使って、既にlikeしたか確認して、もししていたら解除する
    public function unlike($planId)
    {
      if($this->isLike($planId)){
        //もし既に「いいね」していたら消す
        $this->likes()->detach($planId);
      } else {
      }
    }

    protected $table = "users";
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
