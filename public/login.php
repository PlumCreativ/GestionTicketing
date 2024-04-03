<!DOCTYPE html>
<?php
session_start();
// Connexion Ã  la base de données
require_once("class/bd.php");?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Note de Frais </title>
        <link href="asset/css/bootstrap.min.css" rel="stylesheet">
        <link href="asset/css/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    </head>

    <?php
    $mess = '';
    $userId = '';
    if( isset( $_GET['error'] ) ) {
        if( isset( $_GET['userIderror'] ) ) {
            $mess = 'Erreur : Votre identifiant est non valide !';
        }
        if( isset( $_GET['passerror'] ) ) {
            $mess = 'Erreur : Votre mot de passe est non valide !';
            if( isset( $_SESSION['userId'] ) ) {
                $userId = $_SESSION['userId'];
                session_destroy();
            }
        }
    }
    ?>


    <body>
        <header class="container-fluid">

            <nav>

                <ul class="secondary">
                    <li class="nav-button">
                        <a class="btn btn-outline-secondary btn-create px-5" href="singin.php">Sign in</a>
                    </li>                                                  
                    <li class="nav-button">
                        <a class="btn btn-outline-secondary btn-create px-5" href="index.php">Menu</a>
                    </li>     
                </ul>                                                 

            </nav>

            <div class=" row justify-content-center">
                <aside class="container-fluid col-4">

                    <?php
                    if( isset( $_GET['error'] ) ) {
                        echo '<div class="row"><p class="col-10 alert alert-danger">' . $mess .'</p></div>';
                    }
                    ?>

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
                                    <H2 class="header-font H-font">Log in</H2>
                                </div>
                            </div>

                            <!-- Form -->
                            <form class="mb-3" name="accesform" method="post" action="validlogin.php">
                                
                                <!-- Inputs -->
                                <div class="d-column justify-content-center">

                                    <div class="mb-4">
                                        <input type="text" class="form-control border rounded p-2"
                                        id="userId" value="<?=$userId?>" placeholder="Your Name" name="userId" required>
                                    </div>

                                    <div class="mb-4">
                                        <div class="d-flex justify-content-end">
                                            <div>
                                                <i class="bi bi-eye-slash justify-content-sm-between"></i>
                                                <label for="inputPassword">Hide</label>
                                            </div>
                                        </div>
                                        <input type="password" class="form-control border rounded p-2"
                                        id="inputPassword" placeholder="Your password" name="password" required>
                                        <div class="d-flex mt-1 justify-content-end">
                                            <a class="link-dark link-underline-opacity-0 " href="#">Forget your password</a>
                                        </div>
                                        <div>
                                            <i class="bi bi-check-square"></i>
                                            <label for="">Remember me</label>
                                        </div>
                                    </div>

                                </div>  

                                <!-- Button Log in-->
                                <div class="row justify-content-center">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-secondary rounded-5 p-2">Log in</button>
                                    </div>

                                </div>

                            </form>                            

                    </div>

                    <!-- Divider -->
                    <div class="d-flex justify-content-center align-items-center">

                        <div class="divider"></div>
                            
                    </div>

                    <!-- Button Create account-->
                    <div class="row justify-content-center mb-4">
                        <P class="p-4 text-center divider-P">Don’t have an account?</P>
                        <div class="d-grid">
                            <a class="btn btn-outline-secondary btn-create button-H p-2" href="singin.php">Sing up</a>
                        </div>
                    </div>
                    
                </aside>
            </div>

        </header>
    </body>
</html>
