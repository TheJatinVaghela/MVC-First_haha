<?php
    require_once("../model/model.php");
    require_once("../controller/admin_controller.php");
    require_once("../controller/signIn_Up_controller.php");
    class controller extends model
    {
        

        // public $wp_includes = "http://localhost/php\project_one/view/wp-includes" ;
        // public $wp_content = "http://localhost/php\project_one/view/wp-content" ;
        // public $wp_json = "http://localhost/php/project_one/view/wp-json" ;
        // public $amy_movie = "http://localhost/php/project_one/view/amy_movie" ;
        // public $jatin_made = "http://localhost/php/project_one/view/jatin-made" ;
        // public $admin = "http://localhost/php/project_one/Tempate/darkpan-1.0.0/";
        public $sessionGotData ;
        public function __construct(){
            parent::__construct();
            // echo "<pre>";
                // print_r($_SERVER);
              
                if($_SERVER["PATH_INFO"] )
                {   
                    // echo $_SERVER["PATH_INFO"];
                    switch ($_SERVER['PATH_INFO']) 
                    {
                        
                        case '/home':
                            if(isset($_SESSION["GotData"])){
                                $this->sessionGotData = $_SESSION["GotData"];
                            };
                            // $data = $this->SendDataToController();
                            $this->header_footer_inbeetwine("../view/home.php");
                            break;

                        case '/now-playing':
                           
                            $this->header_footer_inbeetwine("../view/now_playing.php");
                            break;
                        
                        case "/coming-soon":
                           
                            $this->header_footer_inbeetwine("../view/comming_soon.php");
                            break;

                        case "/single-movie":
                            
                            $this->header_footer_inbeetwine("../view/single_moive.php");
                            break;

                        case "/Daily-Showtime-Layout-List":
                            
                            $this->header_footer_inbeetwine("../view/daily_showtime_single_list.php");
                            break;

                        case "/book-ticket":
                        
                            $this->header_footer_inbeetwine("../view/book_ticket.php");
                            break;


                        case "/admin" || "/admin/users":
                            // echo "admin /sign-out";
                            $admin_controller = new admin_controller();
                            $admin_controller->admin_sites();
                            // require_once("../controller/admin_controller.php");
                            break;


                        case "/sign-in" || "/sign-up":
                            // require_once("../controller/signIn_Up_controller.php"); 
                            echo "contoler /sign-out";  
                            // $_SESSION["GotData"] = null;                           
                            $user = new signIn_Up();
                            $user->signIn_Up_Files();
                            break;
                            
                        
                            
                        
                        
                           

                        default:
                            // echo "inside default";
                            $this->header_footer_inbeetwine("../view/_404_not_found.php");
                        break;
                    }
                }
                else
                {
                    header('location:home');
                    echo "inside else";
                }
             
        }
        private function header_footer_inbeetwine($file){
           
            require_once('../view/header.php');
            require_once($file);
            require_once("../view/footer.php");
        }

        public function print_stuf_controller($data){
            echo "<pre>";
            print_r($data);
            echo "</pre>";
        }
        
    }

    $controller = new controller;
?>