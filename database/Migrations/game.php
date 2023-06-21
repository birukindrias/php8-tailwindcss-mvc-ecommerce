
<?php
// namespace App\database\Migrations;

use App\config\App;

class  game
{
    public function up()
    {
        $sql =  "CREATE TABLE IF NOT EXISTS game (
            id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
            game VARCHAR(50),
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
            )
 ENGINE = INNODB;";
        App::$app->database->pdo->exec($sql);
        App::$app->database->log("game Table Created");
    }
    public function down()
    {
        $SQL_QUERY = "DROP TABLE IF EXISTS  game;";
        App::$app->database->log("ussgers Droped");
        App::$app->database->pdo->exec($SQL_QUERY);
    }
}
