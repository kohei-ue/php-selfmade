<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Diary extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function comments() {
        return $this->hasMany(Comment::class, 'diary_id', 'id');
    }

    protected $table = "diaries";
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'area',
        'start_date',
        'end_date',
        'body',
        'image1',
        'image2'
    ];
}