<?php
	$mysqli=new mysqli("localhost","rosita","123456","papeleriarosita"); 
   
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida vuelva al inicio';
		echo "<br><center><li><a href='index.php'>VOLVER A OPCIONES</a></center>";
		exit();
		
	}else{
		echo 'Conexion lograda ';

	}
	

?>