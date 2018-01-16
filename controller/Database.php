
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
            $query = "";
            foreach ($payload as $key => $value) {
                
            }

            return $payload;
        }
    }
