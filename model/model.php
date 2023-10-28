<?php
class model{

    
    public $wp_includes = "http://localhost/php\project_one/view/wp-includes" ;
    public $wp_content = "http://localhost/php\project_one/view/wp-content" ;
    public $wp_json = "http://localhost/php/project_one/view/wp-json" ;
    public $amy_movie = "http://localhost/php/project_one/view/amy_movie" ;
    public $jatin_made = "http://localhost/php/project_one/view/jatin-made" ;
    public $admin = "http://localhost/php/project_one/Tempate/darkpan-1.0.0/";
    // public $model_sessionGotData ;

    private $connection;
    public $fatchdata;
    function __construct()
    {   
        $hostname = "localhost";
        $directri = "root";
        $databasename = "movie_theater";
        try {
            $this->connection = new mysqli($hostname,$directri,"",$databasename);
            // echo "connection established";
            
        } catch (\Throwable $th) {
            echo "connection error";
        }
    }
   
    public function print_stuf($stuf){
        echo"<pre>";
        print_r($stuf);
        echo"</pre>";
    }

    function Get_Users_Data($table){
        $sql = "SELECT * FROM $table";
        $sqlex = $this->connection->query($sql);
        if ($sqlex->num_rows > 0) {
            $fatchdata =[];
            $I=0;
            while($I < $sqlex->num_rows){

                array_push($fatchdata,$sqlex->fetch_object());
                $I ++;
            }
            return $fatchdata;
            // $this->print_stuf( $fatchdata);
            // exit();
        } else {
            return "404 Not Found";
        }
        
    }

    public function fileUpload($table,$filename){
        $sql = "INSERT INTO ".$table." (filename) VALUES ($filename)";
        echo $sql;
    }

    public function edituser($table, $id){
        $getuserinfo = "SELECT * FROM ".$table." WHERE u_id = $id"; 
        // $this->print_stuf($getuserinfo);
        $sqlex = $this->connection->query($getuserinfo);
        if($sqlex->num_rows > 0) {  
            $this->fatchdata = $sqlex->fetch_object();
        }
        return $this->fatchdata;

        
        // $sql = "UPDATE $table SET "
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
           
            // return;
          
            // $this->print_stuf($data);
            $data_keys = implode(",",array_keys(array_slice($data , '0', '-1')));
            $data_values = implode("' , '",array_values(array_slice($data,'0','-1')));
            
            $quiry = "insert into $table ($data_keys) values('$data_values')";
            $this->connection->query($quiry);
            echo "<script>alert(Now Sign-In);</script>";
            // $this->print_stuf($table);
            // $this->print_stuf($data_keys);
            // $this->print_stuf($data_values);
            // $this->print_stuf($quiry); 
        }
    }

    
} ?>