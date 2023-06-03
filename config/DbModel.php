<?php

namespace App\config;

use App\config\Database;

abstract class DbModel
{

    abstract public function attrs(): array;
    abstract public static function tableName(): string;
    public function save()
    {
        $tableName = $this->tableName();
        $array_key = $this->attrs();
        $input_keys = array_map(fn ($key) => ":$key", $array_key);
        $sql = "INSERT $tableName (" .  implode(',', $this->attrs()) . ") VALUES (" .  implode(',', $input_keys) . ")";
        $stmt = App::$app->database->pdo->prepare($sql);
        foreach ($this->attrs() as $key) {
            $stmt->bindValue(":$key", $this->{$key});
        }
        // var_dump($stmt);
        // var_dump($tableName);
        try {
            $stmt->execute();
            return true;
        } catch (\Exception $e) {
            // throw new $e;
            // echo "<pre>";
            // var_dump($e);
            // echo "</pre>";
            // App::$app->view->title = 'error';
            echo  App::$app->view->render('pages/error/error', 'error', ['error' => $e]);
        }
    }
    public function savebyValue(array $value)
    {
        echo 'asdf loremasdf'; 
        var_dump($value); 
        $tableName = $this->tableName();
        $array_key = $this->attrs();
        $input_keys = array_map(fn ($key) => ":$key", $array_key);
        $sql = "INSERT $tableName (" .  implode(',', $this->attrs()) . ") VALUES (" .  implode(',', $input_keys) . ")";
        $stmt = App::$app->database->pdo->prepare($sql);
       foreach ($this->attrs() as $key) {
            $stmt->bindValue(":$key",$this->{$key});
        }
        var_dump($stmt);
        var_dump($tableName);
        try {
            $stmt->execute();
            return true;
        } catch (\Exception $e) {
            // throw new $e;
            // echo "<pre>";
            // var_dump($e);
            // echo "</pre>";
            // App::$app->view->title = 'error';
            echo  App::$app->view->render('pages/error/error', 'error', ['error' => $e]);
        }
    }
    public  static function get(array $keys)
    {
        $table_name = static::tableName();
        $array_key = array_keys($keys);
        $input_keys = implode(' AND ', array_map(fn ($key) => "$key = :$key", $array_key));
        $sql = "SELECT * FROM $table_name WHERE $input_keys";
        $stmt = App::$app->database->pdo->prepare($sql);
        foreach ($keys as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();

        $foundItem = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $foundItem;
    }
    public  static function delete(array $keys)
    {
        $table_name = static::tableName();
        $array_key = array_keys($keys);
        $input_keys = implode(' AND ', array_map(fn ($key) => "$key = :$key", $array_key));
        $sql = "DELETE FROM $table_name WHERE $input_keys";
        $stmt = App::$app->database->pdo->prepare($sql);
        var_dump($sql);
        foreach ($keys as $key => $value) {
            $stmt->bindValue(":$key", (int)$value);
        }
        $stmt->execute();

        $foundItem = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $foundItem;
    }

    public  static function getUser(array $keys)
    {
        $table_name = static::tableName();
        $array_key = array_keys($keys);
        $input_keys = implode(' AND ', array_map(fn ($key) => "$key = :$key", $array_key));
        echo "<pre>";
        ($input_keys);
        $input_keys = array_map(fn ($key) => "$key = :$key", $array_key);
        $sql = "SELECT * FROM $table_name WHERE $input_keys";
        $stmt = App::$app->database->pdo->prepare($sql);
        foreach ($keys as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        //   (pdo_error(App::$kernel->databa->pdo));
        $foundItem = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $foundItem;
    }

    public function getAll()
    {
        $table_name = static::tableName();
        $sql = "SELECT * FROM $table_name";
        $stmt = App::$app->database->pdo->prepare($sql);
        // foreach ($this->attrs() as $key => $value) {
        //     $stmt->bindValue(":$key", $value);
        // }
        $stmt->execute();
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return array_reverse($data);
    }
    public function geti($get, $whr)
    {
        $table_name = static::tableName();
        ($table_name);
        echo "SELECT $get FROM   $table_name where $whr[0] = $whr[1] ";
        $data = App::$app->database->prepare("SELECT $get FROM   $table_name where $whr[0] = $whr[1] ");
        $data->execute();
        return $data->fetch();
    }
    public function update(array $keys, array $values)
    {

        $ar = array_merge($values,    $keys);

        $table_name = static::tableName();
        $array_key = array_keys($keys);
        $array_keya = array_keys($values);
        $input_keys = implode(',', array_map(fn ($key) => "$key = :$key", $array_key));
        $input_values = implode(',', array_map(fn ($key) => "$key = :$key", $array_keya));
        $sql = "UPDATE  $table_name SET $input_values WHERE $input_keys";
        $stmt = App::$app->database->pdo->prepare($sql);
        foreach ($ar as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        if (
            $stmt->execute()

        ) {
            return true;
        };

        return false;
    }
    public  static function search(array $thisarrayok)
    {


        $table_name = static::tableName();
        $array_key = array_keys($thisarrayok);
        $input_keys = implode(' AND ', array_map(fn ($key) => "  $key Like :$key", $array_key));
        $SQL_QUERY = "SELECT * FROM $table_name WHERE  $input_keys";
        $QUERY_STMT = App::$app->database->pdo->prepare($SQL_QUERY);
        foreach ($thisarrayok as $key => $value) {
            $QUERY_STMT->bindValue(":$key", $value . '%');
        }
        $QUERY_STMT->execute();
        $retu = $QUERY_STMT->fetchAll(\PDO::FETCH_ASSOC);
        if (!empty($retu)) {
            return $retu;
        } else {
            return 'no match found';
        }
    }
    public  static function innerJoin($table_one, $table_two, array $where_keys = [])
    {

        $where_and_keys = implode(' AND ', array_map(fn ($key) => "$key = :$key", array_keys($where_keys)));
        // select from both tables
        $sql = "SELECT * FROM $table_one RIGHT JOIN $table_two ON $table_one.id = $table_two.p_id WHERE $where_and_keys";
        $sql = App::$app->database->pdo->prepare($sql);
        // var_dump($sql);
        // var_dump($where_keys);
        foreach ($where_keys as $key => $value) {
            $sql->bindValue(":$key", $value);
        }
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);


    }
    public function where()
    {
        // $sql = $this->geti();
    }
}
