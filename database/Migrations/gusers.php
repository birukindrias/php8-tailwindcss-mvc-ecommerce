
<?php
// namespace App\database\Migrations;

use App\config\App;

class  gusers
{
    public function up()
    {
        $sql =  "CREATE TABLE IF NOT EXISTS gusers (
            id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
            username VARCHAR(50),
            phonenumber VARCHAR(50),
            paymentmethod VARCHAR(50),
            balance VARCHAR(50),
            email VARCHAR(50),
            password VARCHAR(50),
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
            )
 ENGINE = INNODB;";
        App::$app->database->pdo->exec($sql);
        App::$app->database->log("gusers Table Created");
    }
    public function down()
    {
        $SQL_QUERY = "DROP TABLE IF EXISTS  gusers;";
        App::$app->database->log("users Droped");
        App::$app->database->pdo->exec($SQL_QUERY);
    }
}
