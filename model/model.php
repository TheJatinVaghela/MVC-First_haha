<?php
class model{

    private $connection;
    function __construct()
    {
        try {
            $this->connection = new mysqli("localhost","root","","movie_theater");
            echo "connection established";
            
        } catch (\Throwable $th) {
            echo "connection error";
        }
    }

    public function print_stuf($stuf){
        echo"<pre>";
        print_r($stuf);
        echo"</pre>";
    }

    protected function register($data , $table){
       
        $this->print_stuf($data);
        $data_keys = implode(",",array_keys(array_slice($data , '0', '-1')));
        $data_values = implode("' , '",array_values(array_slice($data,'0','-1')));

        $quiry = "insert into $table ($data_keys) values('$data_values')";
         $this->connection->query($quiry);

        // $this->print_stuf($table);
        // $this->print_stuf($data_keys);
        // $this->print_stuf($data_values);
        $this->print_stuf($quiry);
    }
} ?>