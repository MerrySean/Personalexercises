
<?php


    class Database {

        protected $host = "";
        protected $Username = "";
        protected $Password = "";
        public $connection;

        // Construct Database
        function __construct(){
            $this->host = 'mysql:host=127.0.0.1;port=3306;dbname=Personal;';
            $this->Username = 'root';
            $this->Password = 'merrysean';
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

        // ONLY ABLE TO CHECK FOR 1 DATA
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

        function selectAll($table,$col,$data){
          $query = "SELECT * FROM %s WHERE %s=%s";
          $query = sprintf($query, $table,$col,':value');

          $db = $this->connection;
          $statement = $db->prepare($query);

          $execute = $statement->execute(['value'=>$data]);
          
          if($execute){
            return $statement->fetch();
          }else{
            return $execute;
          }


        }


    }
