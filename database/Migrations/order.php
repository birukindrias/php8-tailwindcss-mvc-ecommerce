<?php
use App\config\App;

class order{
    public function up()
    {
        $SQL_QUERY = "CREATE TABLE IF NOT EXISTS  order (
                  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
                  u_id VARCHAR(50),
                  p_id VARCHAR(50),
                  total_item VARCHAR(50),
                  total_price VARCHAR(50)       )
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
