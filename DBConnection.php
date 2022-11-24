<?php


class DBConnection {

    public string $db_name; 
    public int $port; 
    public string $host; 
    public string $username;
    public string $password;
    public PDO $mysqlConnection;

    function __construct(string $target_db_name)
    {
        $this->db_name = $target_db_name;
        $this->port = 3306;
        $this->host = "localhost";
        $this->username = "root";
        $this->password = "root";
        
    }

     function open(): PDO {

        try {

            $this->mysqlConnection = new PDO(
                sprintf('mysql:host=%s;dbname=%s;port=%s', 
                $this->host,
                $this->db_name,
                $this->port),
                $this->username,
                $this->password
            );

            $this->mysqlConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(Exception $exception) {
            die('Oops, something went wrong when opening DB connection : '.$exception->getMessage());
        }
        return $this->mysqlConnection;
        
    }

     function close(): void {
        unset($this->mysqlConnection);
    }


    
}