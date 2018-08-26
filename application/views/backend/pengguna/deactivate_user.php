<h1>Deactivate user</h1>
<p>
	Apakah Anda ingin men-deactivate user : <?php echo $user->username;?>
</p>

<?php echo form_open("backend/pengguna/deactivate/".$user->id);?>

  <p>
	Ya
    <input type="radio" name="confirm" value="yes" checked="checked" />
	
	Tidak
    <input type="radio" name="confirm" value="no" />
  </p>

  <?php echo form_hidden($csrf); ?>
  <?php echo form_hidden(array('id'=>$user->id)); ?>

  <p><?php echo form_submit('submit', 'Deactivate');?></p>

<?php echo form_close();?>