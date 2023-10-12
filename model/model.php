<?php
class model{

    public $connection;
    function __construct()
    {
        try {
            $this->connection = new mysqli("localhost","root","","movie_theater");
            echo "connection established";
            
        } catch (\Throwable $th) {
            echo "connection error";
        }
    }

} ?>