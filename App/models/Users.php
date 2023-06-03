<?php

namespace App\App\models;

use App\config\Model;

class Users extends Model
{
    public string $username = '';
    public string $phoneNumber = '';
    public string $password = '';
    // public string $image = 'userimg';
    
    public static function tableName():string
    {
        return 'users';
    }
    public function rules(): array
    {
        return [
            'username' => [self::RULE_REQUIRED],
            'phoneNumber' => [self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8]],
         
        ];
    }
    public function attrs():array
    {
        return [
            'username',
            'phoneNumber',
            'password',
        ];
    }
   
   
}