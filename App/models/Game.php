<?php

namespace App\App\models;

use App\config\Model;

class Game extends Model
{
    public string $game = '';
    // public string $room  = '';
    // public string $user_id = '';
    // public string $admin_id = '';
    // public string $date  = '';
    // public string $image = 'userimg';
    
    public static function tableName():string
    {
        return 'game';
    }
    public function rules(): array
    {
        return [
            'game' => [self::RULE_REQUIRED],
            // 'room' => [self::RULE_REQUIRED],
            // 'user_id' => [self::RULE_REQUIRED],
            // 'admin_id' => [self::RULE_REQUIRED],
            // 'date' => [self::RULE_REQUIRED],
         
        ];
    }
    public function attrs():array
    {
        return [
            'game',
            // 'room',
            // 'user_id',
            // 'admin_id',
            // 'date',
        ];
    }
   
   
}