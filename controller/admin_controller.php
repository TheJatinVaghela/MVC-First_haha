<?php 

        if(isset($_SESSION["GotData"])){
            // $this->print_stuf_controller($_SESSION["GotData"]);
            $fetchdata = $this->Get_Users_Data('users');
            // echo $_SERVER['PATH_INFO'];
            switch ($_SERVER['PATH_INFO']) {
                case '/admin':
                    require_once("F:/Xampp/xammp/htdocs/php/project_one/view/admin/amin_header.php");
                    require_once("F:/Xampp/xammp/htdocs/php/project_one/view/admin/admin.php");
                    require_once("F:/Xampp/xammp/htdocs/php/project_one/view/admin/admin_footer.php");
                    break;
                    
                
                case '/admin/users':
                    require_once("F:/Xampp/xammp/htdocs/php/project_one/view/admin/amin_header.php");
                    require_once("F:/Xampp/xammp/htdocs/php/project_one/view/admin/admin_users.php");
                    require_once("F:/Xampp/xammp/htdocs/php/project_one/view/admin/admin_footer.php");
                    break;    
                    
                   
                default:
                    require_once("F:/Xampp/xammp/htdocs/php/project_one/controller/signIn_Up_controller.php");
                     break;
                    
            }
           
        }else{
           
            require_once("F:/Xampp/xammp/htdocs/php/project_one/controller/signIn_Up_controller.php");
        }
        
        
?>