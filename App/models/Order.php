<?php
namespace App\App\models;

use App\config\Model;
class Order extends Model 
{
    public string $u_id = '';
    public string $status = '';
    public string $amount = '';

    public static function tableName(): string
    {
        return "orders";
    }
    public function rules(): array
    {
        return [
          "u_id"=> [self::RULE_REQUIRED],
            "status"=> [self::RULE_REQUIRED],
            "amount"=> [self::RULE_REQUIRED],
        ];
    }
    public function attrs(): array
    {
        return [
            'u_id',
            'amount',
            'status',

        ];
    }
      
}
