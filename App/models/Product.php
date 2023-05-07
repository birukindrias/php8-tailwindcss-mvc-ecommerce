<?php
namespace App\App\models;

use App\config\Model;
class Product extends Model 
{
  
public string $pname = '';
    public string $pprice = '';
    public string $amount = '';
    public string $primg = 'userimg';
    public static function tableName(): string
    {
        return "products";
    }
    public function rules(): array
    {
        return [
            'pname' => [self::RULE_REQUIRED],
            'amount' => [self::RULE_REQUIRED],
            'primg' => [self::RULE_REQUIRED],
            'pprice' => [self::RULE_REQUIRED],
        ];
    }
    public function attrs(): array
    {
        return [
           'pname' ,
'amount' ,
'primg' ,
'pprice' 

        ];
    }
      
}
