<?php
use App\config\App;

class cart{
    public function up()
    {
        $SQL_QUERY = "CREATE TABLE IF NOT EXISTS  cart (
                  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
                  u_id VARCHAR(50),
                  p_id VARCHAR(50),
                  ctotal VARCHAR(50)       )
       ENGINE = INNODB;";
        App::$app->database->pdo->exec($SQL_QUERY);
        App::$app->database->log("carts Table Created");

    }
    public function down()
    {
       $SQL_QUERY = "DROP TABLE IF EXISTS  cart;";
       App::$app->database->log("Droping cart");
       App::$app->database->pdo->exec($SQL_QUERY);
    }
}
