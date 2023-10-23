<?php
require_once("/Xampp/xammp/htdocs/php/project_one/model/model.php");

class signIn_Up extends model
{
    

    private function set_url( $url )
    {
        echo("<script>history.replaceState({},'','$url');</script>");
    }

    public function signIn_Up_Files(){
         $this->set_url("http://localhost/php/project_one/public/sign-up");
        if($_SERVER['PATH_INFO'] == '/sign-up'){
            $_SESSION["GotData"] = null;
          }

        if(isset($_REQUEST["Sign_Up"])){ $this->register($_REQUEST,"users",false); }
        else if(isset($_REQUEST["Sign_In"])){
            $GotData = $this->register($_REQUEST,"users",true);
            // $this->print_stuf($GotData);
            if($GotData->guest_admin == 1)
            {
                $cookie_name = "guest_admin";
                $cookie_value = $GotData->guest_admin;
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
                $_SESSION['GotData'] = $GotData;
                header("Location:admin");
            }
            else if ($GotData->guest_admin == 0)
            {
                $_SESSION['GotData'] = $GotData;
                // $this->print_stuf($gotData = $_SESSION['GotData']);
                 header("Location:home");
            }
            else
            {
                // $this->print_stuf("invalid response");
            }
        }
        
        // $this->header_footer_inbeetwine("F:/Xampp/xammp/htdocs/php/project_one/view/sign_inANDsign_up.php");
            require_once('F:/Xampp/xammp/htdocs/php/project_one/view/header.php');
            require_once("F:/Xampp/xammp/htdocs/php/project_one/view/sign_inANDsign_up.php");
            require_once("F:/Xampp/xammp/htdocs/php/project_one/view/footer.php");
    }
}


?>