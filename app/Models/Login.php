<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Plan;
use Illuminate\Database\Eloquent\SoftDeletes;

class Login extends Model
{
    use HasFactory;
    use SoftDeletes;
    // public $timestamps = false;
    public function plans() {
        return $this->hasMany(Plan::class);
    }
    public function liked_plans() {
        return $this->belongsToMany('App\Models\Plan', 'likes');
    }

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