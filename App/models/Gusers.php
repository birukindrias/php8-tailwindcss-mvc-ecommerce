<?php

namespace App\App\models;

use App\config\Model;

class Gusers extends Model
{
    public string $username = '';
    public string $phonenumber = '';
    public string $paymentmethod = '';
    public string $balance = '';
    public string $email = '';
    public string $password = '';
    public string $image = 'userimg';
    
    public static function tableName():string
    {
        return 'gusers';
    }
    public static function id():string
    {
        return 'id';
    }
    public function rules(): array
    {
        return [
            'username' => [self::RULE_REQUIRED],
            'phonenumber' => [self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED],
            'paymentmethod' => [self::RULE_REQUIRED],
            'balance' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED],
         
        ];
    }
    public function attrs():array
    {
        return [
            'username',
            'phonenumber',
            'password',
            'paymentmethod',
            'balance',
            'email',
        ];
    }
   
   
}