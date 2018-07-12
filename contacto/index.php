<?php require 'contacto.php'; ?>
<link rel="stylesheet" type="text/css" href="contacto/styles.css">
<section class="contact">
	<div class="contacto">
		<div class="ct_titulo">
			<h2>Contacto</h2>
		</div>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>
			<input type="text" name='name' placeholder="Nombre" value='<?php if(isset($ct_name) && !empty($ct_name)){echo $ct_name;} ?>'>
			<input type="text" name='mail' placeholder="Email" value='<?php if(isset($ct_mail) && !empty($ct_mail)){echo $ct_mail;} ?>'>
			<textarea placeholder="Mensaje" name='comment'></textarea>
			<?php if(!empty($ct_errors)): ?>
				<p class='error'><?php echo $ct_errors; ?></p>
			<?php endif; ?>
			<?php if($ct_enviado === true): ?>
				<p class='env'>Mensaje Enviado Correctamente</p>
			<?php endif; ?>
			<input type="submit" value='Enviar Mensaje' name='contact'>
		</form>
	</div>
</section>