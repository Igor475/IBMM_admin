<?php
@session_start();

if(@$_SESSION['nivel_usuario'] != 'pastor presidente') {
    echo "<script>window.location='../index.php'</script>";
}

?>
