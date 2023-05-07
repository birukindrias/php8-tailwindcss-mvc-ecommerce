<?php
use App\config\App;

class orders{
    public function up()
    {
        $SQL_QUERY = "CREATE TABLE IF NOT EXISTS  `orders` (
                  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
                  u_id VARCHAR(50),
                  amount VARCHAR(50),
                  `status` VARCHAR(50))
       ENGINE = INNODB;";
        App::$app->database->pdo->exec($SQL_QUERY);
        App::$app->database->log("orders Table Created");

    }
    public function down()
    {
       $SQL_QUERY = "DROP TABLE IF EXISTS  order;";
       App::$app->database->log("Droping order");
       App::$app->database->pdo->exec($SQL_QUERY);
    }
}
