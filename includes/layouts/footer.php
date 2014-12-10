      		 <!-- Memulai Base -->
		 <div id="base">
		 <div id="sitename">Copyright <?php echo date("Y")?>, Karang Anyar Ber1</div>
</div>
</div>
</body>
</html>
<?php 
	if(isset($connection)){
		mysqli_close($connection);
	}
?>