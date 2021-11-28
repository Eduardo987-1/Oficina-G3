
<?php
	$data_mensagens = $_REQUEST['mensagens'] ?? '[]';
	$alerts = json_decode($data_mensagens, true);
?>

<?php foreach ($alerts as $type => $mensagens):?>
	<?php foreach ($mensagens as $msg): ?>
		<?php $class_alert =  $type=='sucesso'? 'alert-success' : 'alert-danger' ; ?>
		<div class="alert <?= $class_alert; ?> alert-dismissible fade show" role="alert">
		  <strong><?= ucwords($type); ?>: </strong><?= ucwords($msg); ?>
		  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endforeach; ?>
<?php endforeach; ?>
