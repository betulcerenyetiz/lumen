<?php
    session_destroy();
    setcookie("user","",time()-1);
    echo "<script>
             alert('Session Ended!');
             window.location.href='index.php';
            </script>"
?>