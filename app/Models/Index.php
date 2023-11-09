<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Index extends Model
{
    use HasFactory;

    protected $fillable=['username','user_email','password'];
    protected $table = 'users';

    public static function createRecord(array $data)
    {
        return self::create([
            'username' => $data['name'],
            'user_email' => $data['email'],
            'password' => $data['password'],
        ]);
    }
}
