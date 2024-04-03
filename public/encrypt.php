<?php
require_once("class/bd.php");


session_start();

// Vérifier si le nom existe déjà
$userId = htmlspecialchars( $_POST['userId'] );
$mail = htmlspecialchars( $_POST['mail'] );

$password =  htmlspecialchars($_POST['password']);
$passwordConfirm = htmlspecialchars( $_POST['passwordConfirm'] );

$req = $db->prepare( 'SELECT * FROM clients WHERE id_clients=:userId' );
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

$email_car = '@';

if( !strstr($mail, $email_car) ) {
    
    header( 'Location: singin.php?invalidmail=1' );
    exit();
}

$checkLicence = $db->prepare('SELECT num_licence FROM adherent WHERE num_licence=:licence');
$checkLicence->execute([':licence'=>$licence]);
$result = $checkLicence->fetch(PDO::FETCH_ASSOC);

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
    "INSERT INTO clients( identifiant, password, mail, num_recu, num_licence, adresse, code_postale, ville)
     VALUES( :userId, :password, :mail)"
);

$isInsertOk = $req->execute([
    ':userId'           => $userId,
    ':mail'             => $mail,

    ':password'         => bin2hex($passHash)
]);

if( !$isInsertOk ) {
    echo "Erreur lors de l'enregistrement ";
    var_dump($isInsertOk);
    die;
} else {
    $idUser = $db->lastInsertId();
    $_SESSION['id']             = $idUser;
    $_SESSION['userId']         = $userId;
    $_SESSION['mail']           = $mail;

    $_SESSION['password']       = $password;

    header("Location: index.php");
}
