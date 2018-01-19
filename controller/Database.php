
<?php


    class Database {

        protected $host = "";
        protected $Username = "";
        protected $Password = "";
        public $connection;

        // Construct Database
        function __construct($payload){
            $this->host = $payload['host'];
            $this->Username = $payload['user'];
            $this->Password = $payload['pass'];
            $this->connection = new PDO($this->host, $this->Username, $this->Password);
        }

        function Insert($table, $payload){
            $query = "INSERT INTO %s (%s) VALUES(%s) ";
            $columns = implode(',',array_keys($payload));
            $semiValue = ':'.implode(',:',array_keys($payload));
            $query = sprintf($query, $table, $columns, $semiValue);

            $db = $this->connection;
            $statement = $db->prepare($query);
            return $statement->execute($payload);
        }

        function Exist($table,$col,$data){
            $query = "SELECT * FROM %s WHERE %s=%s";
            $query = sprintf($query, $table,$col,':value');

            $db = $this->connection;
            $statement = $db->prepare($query);

            $result = $statement->execute(['value'=>$data]);
            if($statement->fetch()){
              return true;
            }else{
              return false;
            }

        }


    }
