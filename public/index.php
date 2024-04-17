<!DOCTYPE html>
<?php
session_start();
require_once("..\model\bd.php");?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion de ticketing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css\style.css" rel="stylesheet">
</head>

    <body>
        <header>

            <?php
                $errorMessage = '';
                if( isset( $_SESSION['userId'] ) ) 
                {
            ?>


            <aside>

                <nav>

                    <ul style="margin: 0 !important;">
                        
                    </ul>
        
                    <ul style="margin: 0 !important;">
                        <li class="nav-button">
                            <a class="btn btn-outline-secondary btn-create px-5" href="userView.html.twig">Users</a>
                        </li>
                        <li class="nav-button">
                            <a class="btn btn-outline-secondary btn-create px-5" href="ticketView.html.twig">Ticket's</a>
                        </li>                

                        <li class="nav-button">
                            <a class="btn btn-outline-secondary btn-create p-2 " href="indexView.html.twig">Menu</a>
                        </li>
                                                                    
                    </ul style="margin: 0 !important;">

                    <ul class="secondary">
                        <li class="nav-button">
                            <a class="btn btn-outline-secondary btn-create px-5" href="logoutView.html.twig">Logout</a>
                        </li>                                                    
                    </ul>                                                 

                </nav>

                <div class="container-fluid w-100 h-25">
                    <div class="row justify-content-center mb-5">
                        <div class=" text-center">
                            <H1>Gestion de ticketing</H1>
                        </div>
                    </div>
                </div>
                        
                        
                    <nav>

                        <ul class="secondary" style="margin: 0 !important;">
                            <li class="nav-button">
                                <a class="btn btn-outline-secondary btn-create px-5" href="logout.php">Logout</a>
                            </li>                                                    
                        </ul>                                                 

                    </nav>

                    <div class="container-fluid w-100 h-25">
                        <div class="row justify-content-center mb-5">
                            <div class=" text-center">
                                <H1>Create a ticket</H1>
                            </div>
                        </div>
                    </div>

                </div>
            </aside>
                    
            <?php
            }else {
            ?>              
                            
                <aside class="container-fluid">

                    <nav>
                        <ul style="margin: 0 !important;">
                            <li class="nav-button">
                                <a class="btn btn-outline-secondary btn-create px-5" href="login.php">
                                    Log in
                                </a>
                            </li>

                            <li class="nav-button">
                                <a class="btn btn-outline-secondary btn-create px-5" href="singin.php">
                                    Sign in
                                </a>
                            </li>                                                      
                        </ul>                                                
                    </nav>

                </aside>
                        
            <?php 
            }
            ?>

        </header>
    </body>
</html>

