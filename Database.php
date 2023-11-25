<?php

// Connect to the database, and execute a query
class Database {
    private $connection;

    public function __construct($config)
    {
        // since $config is dynamic, we pushed it out of the class,
        // and upward to the next level where we call or instantiate the class
        // then we created a file that returns config data, as it depends on the env; so we have different file similar like that in production for example

        // http_build_query($config); //"host=localhost&port=3306&dbname=phpapp&charset=utf8mb4"        
        
        $dsn = 'mysql:' . http_build_query($config, '', ';');
        // $dsn = "mysql:host={$config['localhost']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}";

        $this->connection = new PDO($dsn, options: [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query)
    {
        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement;
        // return $statement->fetchAll(PDO::FETCH_ASSOC);
        // return $statement->fetch(PDO::FETCH_ASSOC); // fetches single record
    }
}