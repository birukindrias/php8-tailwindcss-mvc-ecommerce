<?php

namespace App\App\models;

use App\config\Model;

class Mnger extends Model
{
    public string $username = '';
    public string $balance = '';
    public string $password = '';
    // public string $image = 'userimg';
    
    public static function tableName():string
    {
        return 'mnger';
    }
    public function rules(): array
    {
        return [
            'username' => [self::RULE_REQUIRED],
            'balance' => [self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED],
         
        ];
    }
    public function attrs():array
    {
        return [
            'username' ,
            'balance' ,
            'password' ,
      
        ];
    }
   
   
}