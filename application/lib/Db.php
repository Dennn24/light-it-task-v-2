<?php

namespace application\lib;

use PDO;
use application\domain\Number;

class Db
{

    public function saveToDatabase(Number $number)
    {

        $pdo = new PDO("mysql:host=localhost;dbname=numbers", "root", "password");
        $sql = "INSERT INTO numbers (input_number, output_number) VALUES (:input_number, :output_number)";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":input_number", $number->input);
        $statement->bindParam(":output_number", $number->output);
        $statement->execute();

    }

}