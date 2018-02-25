<?php

$username = $_SESSION['username'];

?>
<h4>Halaman  <?php echo $username;
?></h4>

<?php
if(!empty($username)){
?>
<div>
	<ul>
		<li class="span2 ">
			<div class="thumbnail">
				<img src="assets/img/rs.jpg" alt="">
				<div class="caption">
					<p style="text-align: center">
						<a href="index.php?mod=rumahsakit&pg=rumahsakit_view" class="btn btn-primary  btn-small">Rumah Sakit</a>
					</p>
				</div>
			</div>
		</li>
	</ul>
</div>
<?php } ?>
