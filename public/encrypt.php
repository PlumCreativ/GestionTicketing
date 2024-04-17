<?php
require_once("../model/bd.php");


session_start();

// Vérifier si le nom existe déjà
$userId = htmlspecialchars( $_POST['userId'] );

$password =  htmlspecialchars($_POST['password']);
$passwordConfirm = htmlspecialchars( $_POST['passwordConfirm'] );

$isUser =  htmlspecialchars($_POST['isUser']);

$observation = "";

$req = $db->prepare( 'SELECT * FROM clients WHERE login=:userId' );
$req->execute( [':userId'=>$userId] );
if( $req->rowCount() ) {
    header( 'Location: singin.php?invaliduserId=1' );
    exit();
}
// Vérifier le mot de passe et le confirmer
if( strlen( $password ) < 12 ) {
    header( 'Location: singin.php?invalidpass=1' );
    exit();
}

// if(  !$isUser ) {
//     header( 'Location: singin.php?invaliduser=1' );
//     exit();
// }

$user_carh = '@.com';

if( !strstr($userId, $user_carh) ) {
    header( 'Location: singin.php?invalidmail=1' );
    exit();
}

// Vérifier le second mot de passe et le confirmer
if( $password != $passwordConfirm ) {
    header( 'Location: singin.php?invalidconfirm=1' );
    exit();
} 

$passHash = sodium_crypto_pwhash_str( 
    $password, 
    SODIUM_CRYPTO_PWHASH_OPSLIMIT_INTERACTIVE,
    SODIUM_CRYPTO_PWHASH_MEMLIMIT_INTERACTIVE
);

$req = $db->prepare( 
    "INSERT INTO clients( login, password, observation, isUser)
     VALUES( :userId, :password, :observation, :isUser)"
);

$isInsertOk = $req->execute([
    ':userId'           => $userId,
    ':observation'      => $observation,

    ':password'         => bin2hex($passHash),
    ':isUser'           => $isUser
]);

if( !$isInsertOk ) {
    echo "Erreur lors de l'enregistrement ";
    var_dump($isInsertOk);
    die;
} else {
    $idUser = $db->lastInsertId();
    $_SESSION['id']             = $idUser;
    $_SESSION['userId']         = $userId;
    $_SESSION['observation']    = $observation;

    $_SESSION['password']       = $password;

    $_SESSION['isUser']         = $isUser;

    header("Location: index.php");
}
