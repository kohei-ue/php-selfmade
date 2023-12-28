<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Contact extends Model
{
    use HasFactory;
    public function user() {
        return $this->belongsTo(User::class);
    }
    protected $table = "contacts";
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'tel',
        'email',
        'body',
    ];
}