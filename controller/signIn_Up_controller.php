<?php
$_SESSION["GotData"] = null;

if(isset($_REQUEST["Sign_Up"])){ $this->register($_REQUEST,"users",false); }
else if(isset($_REQUEST["Sign_In"])){
    $GotData = $this->register($_REQUEST,"users",true);
    // $this->print_stuf($GotData);
    if($GotData->guest_admin == 1)
    {
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

$this->header_footer_inbeetwine("F:/Xampp/xammp/htdocs/php/project_one/view/sign_inANDsign_up.php");
?>