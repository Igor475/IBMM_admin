<?php
@session_start();

if(@$_SESSION['nivel_usuario'] != 'Pastor Presidente' and @$_SESSION['nivel_usuario'] != 'pastor') {
    echo "<script>window.location='../index.php'</script>";
}

?>
