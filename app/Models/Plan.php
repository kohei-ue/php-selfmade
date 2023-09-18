<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Plan extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function likes() {
        return $this->belongsToMany('App\Models\User', 'likes');
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