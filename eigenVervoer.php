<?php
	if(isset($_GET['pickedRoom'])){
		$_SESSION['room_id'] = $_GET['pickedRoom'];
	}else{
		header("refresh:0;url=pickRoom.php");
	}
	echo "GODVERDOMME RICARDO NIET NOG EEN PAGINA!";
    header("refresh:0;url=booking.php");
?>
