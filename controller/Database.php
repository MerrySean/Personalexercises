
<?php 


    class Database {

        protected $Host = "";
        protected $Username = "";
        protected $Password = "";
        public $connection;
        
        // Construct Database
        function __construct($payload){
            $this->host = $payload['host'];
            $this->Username = $payload['user'];
            $this->Password = $payload['pass'];
            $this->connection = mysqli_connect($this->host, $this->Username, $this->Password);
        }

        function Insert($table, $value){
            $query = "INSERT INTO ".$table." ".$value;

            $result = mysqli_query($this->connection, $query);

            return $result;
        }
    }



