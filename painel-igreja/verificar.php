<?php
@session_start();

if(@$_SESSION['nivel_usuario'] == ""){
	echo "<script>window.location='../index.php'</script>";
	exit();
}

/* if(@$_SESSION['nivel_usuario'] == ""){
	echo "<script>window.location='../index.php'</script>";
	exit();
} */

/*if(@$_SESSION['nivel_usuario'] != 'Pastor Presidente' and @$_SESSION['nivel_usuario'] != 'pastor' 
    and @$_SESSION['nivel_usuario'] != 'tesoureiro') {
    echo "<script>window.location='../index.php'</script>";
}*/

?>
