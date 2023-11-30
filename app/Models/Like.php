<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Login;
use App\Models\Plan;

class Like extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function user() {
        return $this->belongsTo(Login::class);
    }
    public function plan() {
        return $this->belongsTo(Plan::class);
    }

    protected $table = "likes";
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'plan_id'];
}