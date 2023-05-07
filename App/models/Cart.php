<?php
namespace App\App\models;

use App\config\Model;
class Cart extends Model 
{

    public string $u_id = '';
    public string $p_id = '';
    public string $ctotal = '';

    public static function tableName(): string
    {
        return "cart";
    }
    public function rules(): array
    {
        return [
          "u_id"=> [self::RULE_REQUIRED],
          "p_id"=> [self::RULE_REQUIRED],
          "ctotal"=> [self::RULE_REQUIRED],
        ];
    }
    public function attrs(): array
    {
        return [
            "u_id",
            "p_id",
            "ctotal"

        ];
    }
      
}
