<?php

namespace App\App\models;

use App\config\Model;

class Admins extends Model
{
    public string $username = '';
    public string $phoneNumber = '';
    public string $paymentmethod = '';
    public string $balance = '';
    public string $password = '';
    // public string $image = 'userimg';
    
    public static function tableName():string
    {
        return 'admins';
    }
    public function rules(): array
    {
        return [
            'username' => [self::RULE_REQUIRED],
            'phoneNumber' => [self::RULE_REQUIRED],
            'paymentmethod' => [self::RULE_REQUIRED],
            'balance' => [self::RULE_REQUIRED],
        ];
    }
    public function attrs():array
    {
        return [
            'username',
            'phoneNumber',
            'paymentmethod',
            'balance',
        ];
    }
   
   
}