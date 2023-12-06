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