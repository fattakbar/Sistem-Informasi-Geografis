<?php

	include ('inc/config.php');

  $aksi = null;

  if(isset($_GET['id'])) {
		$aksi = "edit";
		$id = $_GET['id'];
		$sql = "select * from admin where idadmin='$id' ";
		$result = mysql_query($sql) or die(mysql_error());
		$baris = mysql_fetch_object($result);

	} else {
		$aksi = "tambah";
	}?>

<form  class="form-horizontal" method="POST" id="form1" action="admin/admin_action.php">
 <legend>  <?php echo $aksi?> admin</legend>
	<input type='hidden' name='id' value="<?php echo $id?>">

  <div class="control-group">
   <label class="control-label" for="username">username</label>
    <div class="controls">
         <input type="text" name='username' class="required"
      value=<?php echo $baris->username;?> >
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="password">Password</label>
    <div class="controls">
         <input type="password" name='password' class="required" minlength="5"
      >
    </div>
  </div>

  <div class="control-group">
    <div class="controls">

      <button type="submit" class="btn btn-success" name='aksi'value=<?php echo $aksi?> ><?php echo $aksi?></button>
    </div>
  </div>
</form>
