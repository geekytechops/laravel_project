<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Facades\DB;

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
    public function loginCheckUser(array $data){

        try {
            $result = \DB::select("CALL Checklogin(?, ?, @pass_res, @user_result)", [$data['email'], $data['password']]);
            $output = \DB::select('SELECT @pass_res AS pass_res, @user_result AS user_result');
    
            $data=[
                'email_error'=>$output[0]->user_result,
                'pass_error'=>$output[0]->pass_res
            ];

            return $data;
        } catch (\Throwable $th) {

            return $th;

        }       
    }
}