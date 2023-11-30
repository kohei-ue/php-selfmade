<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function diary() {
        return $this->belongsTo(Diary::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }

    protected $table = "comments";
    protected $primaryKey = 'id';
    protected $fillable = [
        'diary_id',
        'user_id',
        'comment'
    ];
}