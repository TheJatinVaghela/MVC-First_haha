<?php
    class controller{
        function __construct(){
            // echo "<pre>";
                // print_r($_SERVER);
                if($_SERVER)
                {   
                    echo "<pre>";
                    print_r($_SERVER);
                    echo "</pre>";
                    switch ($_SERVER['PATH_INFO']) 
                    {
                        
                        // case '/home':

                        //     require_once('/Xampp/xammp/htdocs/php/project_one/view/header.php');
                        //     require_once("/Xampp/xammp/htdocs/php/project_one/view/home.php");
                        //     require_once("/Xampp/xammp/htdocs/php/project_one/view/footer.php");
                        //     break;

                        // case '/project':
                        //     require_once('view/header.php');
                        //     require_once('view/project.php');
                        //     require_once('view/footer.php');
                        //     break;
                        
                        default:
                            echo "inside default";

                        break;
                    }
                }
                else
                {
                    // header('location:home');
                    echo "inside else";
                }
                // require_once('/Xampp/xammp/htdocs/php/project_one/_view/header.php');
                // require_once("/Xampp/xammp/htdocs/php/project_one/_view/home.php");
                // require_once("/Xampp/xammp/htdocs/php/project_one/_view/footer.php");
        }
    }

    $controller = new controller;
?>