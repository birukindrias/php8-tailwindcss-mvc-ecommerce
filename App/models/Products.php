<?php
namespace App\App\models;

use App\config\Model;
class Products extends Model 
{
  
/**
 * @var string pname
 */
public string $pname = '';
public string $primg = '';
public  $pprice = '';
public string $amount = '';
public  $user_id = '';

    public static function tableName(): string
    {
        return "products";
    }
    public function rules(): array
    {
        return [
            'pname'=> [self::RULE_REQUIRED],
            // 'pprice'=> [self::RULE_REQUIRED],
            // 'amount'=> [self::RULE_REQUIRED],
            // 'username' => [self::RULE_REQUIRED],
        ];
    }
    public function attrs(): array
    {
        return [
            'pname',
            'primg',
            'pprice',
            'amount',
            'user_id',

        ];
    }
      
}
