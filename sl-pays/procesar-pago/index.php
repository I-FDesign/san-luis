<?php session_start();
    require '../../admin/functions.php';

    if(isset($_SESSION['sl_user'])){
        $username = $_SESSION['sl_user'];
        $conexion = conect();
        $statement = $conexion->prepare('
            SELECT * FROM usuarios WHERE user = :user
        ');
        $statement->execute(array(':user' => $username));
        $resultado = $statement->fetch();

        $email = $resultado['email'];
        $cdest = $resultado['cdest'] + 1;
    }else{
        header('Location: ../../');
    }

	error_reporting(0);
	$token = $_REQUEST["token"];
 	$payment_method_id = $_REQUEST["payment_method_id"];
 	$installments = $_REQUEST["installments"];
 	$issuer_id = $_REQUEST["issuer_id"];

 	require_once '../vendor/autoload.php';

 	MercadoPago\SDK::setAccessToken("TEST-1251596843495116-061217-161ace8f6ae1233eaf94db45e587867a-323292690");
    //...
    $payment = new MercadoPago\Payment();
    $payment->transaction_amount = 50;
    $payment->token = $token;
    $payment->description = "Anuncio Destacado";
    $payment->installments = $installments;
    $payment->payment_method_id = $payment_method_id;
    $payment->issuer_id = $issuer_id;
    $payment->payer = array(
    "email" => $email
    );
    // Guarda y postea el pago
    $payment->save();
    //...
    // Imprime el estado del pago
     // echo $payment->status;
    //...

    if($payment->status == 'approved'){
    	$conexion = conect();
        $statement = $conexion->prepare('
            UPDATE usuarios SET cdest = :cdest WHERE user = :user 
        ');
        $statement->execute(array(':cdest' => $cdest, ':user' => $username));
        header('Location: ../../anuncios/add/?status=ok&message=Pago realizado! Ahora posees ' . $cdest . ' Anuncios');
    }else{
    	 header('Location: ../../anuncios/add/?status=e&message=Ha ocurrido un error en la transaccion');
    }


    


 ?>