<?php
    require_once("/Xampp/xammp/htdocs/php/project_one/model/model.php");
    class controller extends model
    {
        

        public $wp_includes = "http://localhost/php\project_one/view/wp-includes" ;
        public $wp_content = "http://localhost/php\project_one/view/wp-content" ;
        public $wp_json = "http://localhost/php/project_one/view/wp-json" ;
        public $amy_movie = "http://localhost/php/project_one/view/amy_movie" ;
        public $jatin_made = "http://localhost/php/project_one/view/jatin-made" ;

        public function __construct(){
            parent::__construct();
            // echo "<pre>";
                // print_r($_SERVER);
                if($_SERVER["PATH_INFO"])
                {   
                    // echo $_SERVER["PATH_INFO"];
                    switch ($_SERVER['PATH_INFO']) 
                    {
                        
                        case '/home':
                        
                            $this->header_footer_inbeetwine("F:/Xampp/xammp/htdocs/php/project_one/view/home.php");
                            break;

                        case '/now-playing':
                            $this->header_footer_inbeetwine("F:/Xampp/xammp/htdocs/php/project_one/view/now_playing.php");
                            break;
                        
                        case "/coming-soon":
                            $this->header_footer_inbeetwine("F:/Xampp/xammp/htdocs/php/project_one/view/comming_soon.php");
                            break;

                        case "/single-movie":
                            $this->header_footer_inbeetwine("F:/Xampp/xammp/htdocs/php/project_one/view/single_moive.php");
                            break;

                        case "/Daily-Showtime-Layout-List":
                            $this->header_footer_inbeetwine("F:/Xampp/xammp/htdocs/php/project_one/view/daily_showtime_single_list.php");
                            break;

                        case "/book-ticket":
                            $this->header_footer_inbeetwine("F:/Xampp/xammp/htdocs/php/project_one/view/book_ticket.php");
                            break;

                        case "/sign-in" || "/sign-up":
                            $this->header_footer_inbeetwine("F:/Xampp/xammp/htdocs/php/project_one/view/sign_inANDsign_up.php");
                            break;

                        default:
                            // echo "inside default";
                            $this->header_footer_inbeetwine("F:/Xampp/xammp/htdocs/php/project_one/view/_404_not_found.php");
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
            require_once('F:/Xampp/xammp/htdocs/php/project_one/view/header.php');
            require_once($file);
            require_once("F:/Xampp/xammp/htdocs/php/project_one/view/footer.php");
        }
    }

    $controller = new controller;
?>