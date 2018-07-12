<?php 
//Estado
	$status = (isset($_GET['status']) && !is_numeric($_GET['status']) && !empty($_GET['status']))  ? $_GET['status'] : '';
	if($status == 'ok'){
		$status = 'message-ok';
	}elseif($status == 'error'){
		$status = 'message-e';
	}else{
		$status = '';
	}

//Msg estado
	$message = (isset($_GET['message']) && !is_numeric($_GET['message']) && !empty($_GET['message']))  ? $_GET['message'] : 'Ha ocurrido un error desconocido';

 ?>

 <?php if(!empty($status)): ?>
	<div class="<?php echo $status ?>">
		<p><?php echo $message ?></p>
		<i class="fa fa-times" aria-hidden="true"></i>
	</div>
<?php endif; ?>