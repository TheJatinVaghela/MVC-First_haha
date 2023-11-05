<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?php echo $this->admin;?>img/favicon.ico" rel="icon">

    <!-- bootstap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo $this->admin;?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo $this->admin;?>lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo $this->admin;?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo $this->admin;?>css/style.css" rel="stylesheet">
    <style>
        .admin-style{
            display: flex;
            flex-direction: row;
            align-items: center;
            /* justify-content: space-around; */
            gap: 1rem;
            padding: 1rem;
        }
        .Add-user-form-input{
            margin-top: .5rem;
        }
    </style>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i><?php echo $_SESSION["GotData"]->user_name;?> Panal</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="<?php echo $this->admin;?>img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $_SESSION["GotData"]->user_name;?></h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="<?php echo $this->admin_url?>" class="nav-item nav-link active mb-1"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="<?php echo $this->admin_url?>/users" class="nav-item nav-link active mb-1"> <i class="fa fa-users me-2"></i> users table</a>
                    <a href="<?php echo $this->admin_url?>/edit_site" class="nav-item nav-link active mb-1"> <i class="fa fa-pencil-alt me-2"></i> edit site</a>
                    <a href="<?php echo $this->admin_url?>/sign-up" class="nav-item nav-link active mb-1"> <i class="fa fa-sign-in-alt me-2"></i> Sign Up</a>
                    <a href="<?php echo $this->admin_url?>/404" class="nav-item nav-link active mb-1"> <i class="fa fa-exclamation-triangle me-2"></i> 404 Error</a>
                    <a href="<?php echo $this->admin_url?>/blank" class="nav-item nav-link active mb-1"> <i class="fa fa-ban me-2"></i> Blank Page</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="admin-style">
                        <a href="#" class="" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="<?php echo $this->admin;?>img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo $_SESSION["GotData"]->user_name;?></span>
                        </a>
                            <a href="admin/MyProfile" class="">My Profile</a>
                            <a href="admin/Settings" class="">Settings</a>
                            <a href="sign-up" class="">Log Out</a>
                    </div>
                </div>
            </nav>