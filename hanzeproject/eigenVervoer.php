
<?php
	session_start();
	if(isset($_GET['pickedRoom'])){
		$_SESSION['room_id'] = $_GET['pickedRoom'];
	}else{
		header("refresh:0;url=pickRoom.php");
	}
	var_dump($_GET['pickedRoom']);
	var_dump ($_SESSION['room_id']);
	var_dump ($_SESSION['room_type']);
	var_dump ($_SESSION['transport']);
	echo "GODVERDOMME RICARDO NIET NOG EEN PAGINA!";
	header("refresh:10;url=includes/booking.php");
?>

