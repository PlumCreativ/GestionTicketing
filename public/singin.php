<!DOCTYPE html>
<?php
session_start();
// Connexion Ã  la base de données
require_once("../model/bd.php");?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Create Ticket </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        <link href="css\style.css" rel="stylesheet">

    </head>


    <?php

        $errorMessage  = '';
        if( isset( $_GET['invaliduserId'] ) ) {
            $errorMessage = 'Désolé ! ce mail est déjà utilisé.';
        }

        if( isset( $_GET['invalidpass'] ) ) {
            $errorMessage = 'Désolé ! Mot de passe invalide.';
        }
        if( isset( $_GET['invalidconfirm'] ) ) {
            $errorMessage = 'Erreur sur la confirmation du mot de passe';
        }
        // if( isset( $_GET['invaliduser'] ) ) {
        //     $errorMessage = 'Erreur sur le choix de la connexion';
        // }

    ?>

    <body>
        <header class="container-fluid">


            <nav>

                <ul class="secondary" style="margin: 0 !important;">
                    <li class="nav-button">
                        <a class="btn btn-outline-secondary btn-create px-5" href="login.php">Log in</a>
                    </li>
                    <li class="nav-button">
                        <a class="btn btn-outline-secondary btn-create px-5" href="index.php">Menu</a>
                    </li>                                                      
                </ul>                                                

            </nav>


        
            <?php
            if( !empty( $errorMessage ) ) {
                echo '<p class="col-9 ml-4 col alert alert-danger">' . $errorMessage .'</p>';
            }
            ?>

            <div class=" row justify-content-center">
                <aside class="container-fluid col-4">

                    <div class="row justify-content-center gap-3">

                        <!-- Icon -->
                        <div class="d-flex justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none">
                            <circle cx="32" cy="32" r="32" fill="#C4C4C4"/>
                            </svg>
                        </div>
                    
                        <!-- Sing in-->
                        <div class="frame">

                            <div class="row justify-content-center mb-4">
                                <div class="col-6">
                                    <H2 class="header-font H-font">Sign in</H2>
                                </div>
                            </div>

                            <!-- Form -->
                            <form class="mb-5" name="accesform" method="post" action="encrypt.php">
                                
                                <!-- Inputs -->
                                <div class="d-column justify-content-center">

                                    <div class="mb-4">
                                        <input type="text" class="form-control border rounded p-2"
                                        id="userId" placeholder="Your email" name="userId" required>
                                    </div>
                                        
                                    <div class="mb-4">
                                        <input type="password" class="form-control border rounded p-2"
                                        id="inputPassword" placeholder="Your password" name="password" required>
                                    </div>

                                    <div class="mb-4">
                                        <input type="password" class="form-control border rounded p-2"
                                        id="inputPasswordConfirm" placeholder="Confirm your password" name="passwordConfirm" required>
                                    </div>

                                    <div class="mb-4 d-flex justify-content-around">
                                        <label class="g-col-6" for="isUser">Are you Developer</label>
                                        <input type="checkbox" class=" border rounded p-2"
                                        id="isUser" name="isUser">
                                    </div>

                                </div>  

                                <!-- Button Log in-->
                                <div class="row justify-content-center gap-3">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-secondary rounded-5 p-2">Sing in</button>
                                    </div>

                                    <!-- Privates links -->
                                    <div class="d-grid">
                                        <P >By continuing you agree to the <a class="text-dark" href="#">Terms of use</a> and 
                                        <a  class="text-dark" href="#">Privacy Policy</a></P>
                                    </div>
                                </div>

                            </form>                            
                            
                            <!-- Links -->
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <a class="text-dark" href="#">Other issue with sign in</a>
                                </div>
                                <div>
                                    <a class="text-dark" href="#">Forgot your password</a>
                                </div>
                            </div>
                        </div>


                        <!-- Divider -->
                        <div class="d-flex justify-content-center align-items-center">

                            <div class="divider"></div>
                                <div>
                                    <P class="divider-H p-4">You have an account</P>
                                </div>
                            <div class="divider"></div>

                        </div>

                        <!-- Button Create account-->
                        <div class="row justify-content-center mb-4">
                            <div class="d-grid">
                                <a class="btn btn-outline-secondary btn-create  p-2" href="login.php">Log in</a>
                            </div>
                        </div>

                    </div>

                </aside>

            </div>

        </header>
    </body>
</html>
