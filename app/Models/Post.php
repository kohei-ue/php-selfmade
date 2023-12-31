<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Reply;

class Post extends Model
{
    use HasFactory;
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function replies() {
        return $this->hasMany(Reply::class);
    }
    protected $table = "posts";
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'message',
    ];
}