<?php
namespace App\App\models;

use App\config\Model;
class Order extends Model 
{
    public string $u_id = '';
    public string $p_id = '';
    public string $total_item = '';
    public string $total_price = '';

    public static function tableName(): string
    {
        return "orders";
    }
    public function rules(): array
    {
        return [
          "u_id"=> [self::RULE_REQUIRED],
          "p_id"=> [self::RULE_REQUIRED],
          "total_item"=> [self::RULE_REQUIRED],
          "total_price"=> [self::RULE_REQUIRED],
        ];
    }
    public function attrs(): array
    {
        return [
            'u_id',
            'p_id',
            'total_item',
            'total_price',

        ];
    }
      
}
