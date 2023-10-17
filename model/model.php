<?php
class model{

    private $connection;
    public $fatchdata;
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

    protected function register($data , $table , $sign_inData){
        if($sign_inData){
        //   $this->print_stuf($data);
          $sql = "SELECT * FROM ".$table." WHERE(user_mail = '$data[Chack_User_Mail]') AND user_password = '$data[Chack_user_password]'";
          $sqlex = $this->connection->query($sql);
        //   $this->print_stuf($sqlex);

            if($sqlex->num_rows > 0){
                // $FetchData = $sqlex->fetch_all(); // numeric Array 
                // $FetchData = $sqlex->fetch_array();  // numeric and assoc
                // $FetchData = $sqlex->fetch_assoc();  //  assoc
                // $FetchData = $sqlex->fetch_field();  //  table column
                // $FetchData = $sqlex->fetch_row();  //  single and only numeric array
                // $fetchdata = $sqlex->fetch_object();  //  object res
                $this->fatchdata = $sqlex->fetch_object();
                if($this->fatchdata->guest_admin > 0){
                    return  $this->fatchdata ;
                }
               
                return  $this->fatchdata ;
            }else{
                $this->fatchdata = "Wrong Information";
                return $this->fatchdata;
                }
            return ;
        }else if(!$sign_inData){
           
            return;
           /* 
            $this->print_stuf($data);
            $data_keys = implode(",",array_keys(array_slice($data , '0', '-1')));
            $data_values = implode("' , '",array_values(array_slice($data,'0','-1')));
            
            $quiry = "insert into $table ($data_keys) values('$data_values')";
            $this->connection->query($quiry);
            
            // $this->print_stuf($table);
            // $this->print_stuf($data_keys);
            // $this->print_stuf($data_values);
            $this->print_stuf($quiry); */
        }
    }

    
} ?>