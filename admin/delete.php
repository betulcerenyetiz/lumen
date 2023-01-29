<?php
    include("../inc/db.php");
    $referer = $_SERVER["HTTP_REFERER"];
    if($referer==""){
        header("Location: exit.php");
    }
    $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
    if($_GET){
        $table=$_GET["table"];
        $id=(int)$_GET["id"];
        $delete=$connection->query("delete from $table WHERE id=$id");
        echo "<script>
        alert('Data Deleted!');
        window.location.href='$url';
       </script>";

    }
?>