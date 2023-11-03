<?php

require_once("../model/model.php");
require_once("../controller/signIn_Up_controller.php");
class admin_controller extends model
{

    public $fetchdata ; 
    public $getuserdata;
    public $admin_url = "http://localhost/php/project_one/public/admin";
    /**
     * Convert images in a directory to WebP format and save them to another directory.
 *
 * @param string $sourceDir      The source directory containing the images.
 * @param string $destinationDir The destination directory to save the converted images.
 */
private function convertImagesToWebP($sourceDir, $destinationDir) {
    // Get all files in the source directory
    $files = scandir($sourceDir);
    array_shift($files);
    array_shift($files);
    $this->print_stuf_admin($files);
    // Loop through each file in the source directory
    foreach ($files as $file) {
        // Check if the file is an image (you can modify the condition as needed)
        if (is_file($sourceDir . '/' . $file) && in_array(pathinfo($file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif','webp'])) {
            // Create a new image from the source file
            $image = imagecreatefromstring(file_get_contents($sourceDir . '/' . $file));
            
            // Create a new filename with the WebP extension
            $newFilename = pathinfo($file, PATHINFO_FILENAME) . '.webp';
            
            // Save the image as WebP to the destination directory with 80% quality (adjust as desired)
            imagewebp($image, $destinationDir . '/' . $newFilename, 80);
            
            // Free up memory
            imagedestroy($image);
            
            echo "Converted: " . $file . "\n";            
        }
    }
    $files = glob($sourceDir.'/'.'*.{jpg,jpeg,png,gif}', GLOB_BRACE);
    // $this->print_stuf_admin("in ");
    // $this->print_stuf_admin($files);
    foreach($files as $file){
        if(is_file($file))
        unlink($file);
    }
    return $newFilename;
    // echo "Conversion completed!";
}

private function get_imgs(){
    if(isset($_REQUEST["submit"])){
        echo "<pre>";
        print_r ($_FILES);
        echo "</pre>";
        $id='';
        $img_name = $_FILES["fileUpload"]["name"];
        if($img_name != null){
            $id= uniqid().time();
            $img_name = $id.$_FILES["fileUpload"]["name"];
        }
        
        $destination = "../assets/edit_site_imgs";
        move_uploaded_file($_FILES["fileUpload"]["tmp_name"],$destination."/".$img_name);
        
        $sourceDir = '../assets/edit_site_imgs';
        $destinationDir = '../assets/edit_site_webp';
        
        try {
            if($_FILES["fileUpload"]["type"] != 'image/webp'){

                $newfilename=$this->convertImagesToWebP($sourceDir, $destinationDir);
            }
            
        } catch (Exception $e) {
            // Log the error
            error_log('Image conversion error: ' . $e->getMessage());
            $error = $e;
            // Display user-friendly error message
            echo 'An error occurred during image conversion. Please try again later.';
            // Optionally, terminate the script execution
            exit();
        }

        $img_name = $destinationDir."/".$id.$newfilename;
        $position = $_REQUEST["submit"];
        $error="null";
        $this->print_stuf_admin($_FILES["fileUpload"]["type"]);

        if($error == "null"){
            $this->fileUpload("files", $img_name,$position);

        }else{
            $this->print_stuf_admin($error);
        }
        
    }else{
        // echo "no File";
        // if(isset($_REQUEST["saveuser"])){
        //     $this->print_stuf_admin($_FILES);
        // }
    }
}

private function updateUser(){
    if(isset($_REQUEST['updateUser'])){
        $this->print_stuf_admin($_REQUEST['updateUser']);
        $this->getuserdata = $this->edituser("users",$_REQUEST['updateUser']);
       
        //  unset($this->getuserdata->u_id);
        // $this->print_stuf_admin($this->getuserdata);
         $_SESSION["edituserinfo"] = $this->getuserdata;

         header("Location:edit_site");
    }else{
        // $this->print_stuf_admin("no updateUser");
    }
}

public function updating_user(){
    if (isset($_REQUEST["u_id"])) {
        
        // $this->print_stuf_admin($_SESSION["edituserinfo"]);
        // $this->print_stuf_admin($_REQUEST);
        $set = $this->update_user("users",$_REQUEST);
        if($set == true){
            header("Location:users");
        }
        //  return;
    } else {
         return;
    }
    
}

public function admin_sites() {
    // $this->print_stuf_admin($_COOKIE["guest_admin"]);

    if(isset($_SESSION["GotData"])){
        // $this->print_stuf_controller($_SESSION["GotData"]);
        if($_SESSION["GotData"]->guest_admin != 1){
            $user = new signIn_Up();
            $user->signIn_Up_Files();
            if($_SERVER['PATH_INFO'] == '/sign-up' || $_SERVER['PATH_INFO'] == '/admin'){
                setcookie("guest_admin", null, time() + (86400 * 30), "/"); // 86400 = 1 day
                 $_SESSION["GotData"] = null; 
            }
            return;
        };
         $this->fetchdata = $this->Get_Users_Data('users');

        // echo $_SERVER['PATH_INFO'];
        switch ($_SERVER['PATH_INFO']) {
            case '/admin':
               
                $this->admin_inbitwin("../view/admin/admin.php");
                break;
                
            
            case '/admin/users':
                $_SERVER['PATH_INFO'] ="/admin/users"; 
                 $this->updateUser();
                 if(isset($_REQUEST["deleteUser"])){
                   $set = $this->deletuser("users",$_REQUEST["deleteUser"]);
                   if($set == true){
                    header("Location:users");
                   }
                 }
                $this->admin_inbitwin("../view/admin/admin_users.php");
                break;    
                
            case '/admin/edit_site':
                $_SERVER['PATH_INFO'] ="/admin/edit_site"; 
                // $this->print_stuf_admin($_REQUEST["saveuser"]);
                $this->get_imgs();
                $this->updating_user();
                if(isset($_REQUEST["add_new_user"])){
                    array_pop($_REQUEST);
                    // $this->print_stuf_admin($_REQUEST);
                    $set = $this->insertuser("users",$_REQUEST);
                    if($set == true){
                        header("Location:users");
                    }else if($set != true){
                        echo "THERE IS ERROR";
                    }
                }
                $this->admin_inbitwin("../view/admin/edit_site.php");
                break;

            default:
                if($_SERVER['PATH_INFO'] == '/sign-up'){
                    setcookie("guest_admin", null, time() + (86400 * 30), "/"); // 86400 = 1 day
                    $_SESSION["GotData"] = null; 
                }
            //   $_SESSION["GotData"] = null;
                $user = new signIn_Up();
                $user->signIn_Up_Files();
            // header("Location:http://localhost/php/project_one/public/sign-up");
                //  require_once("../controller/signIn_Up_controller.php");
                 break;
                return;
        }
       
    }else{ 
      
              $user = new signIn_Up();
              $user->signIn_Up_Files();
                return;
        //  header("Location:http://localhost/php/project_one/public/sign-up");
    //    header("Location:home");
        // require_once("../controller/signIn_Up_controller.php");
    }
}

protected function admin_inbitwin($file){
    $fetchdata = $this->fetchdata;
    require_once("../view/admin/amin_header.php");
    require_once($file);
    require_once("../view/admin/admin_footer.php");
}

protected function print_stuf_admin($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

}
?>
<?php 
    
        
        
       
?>