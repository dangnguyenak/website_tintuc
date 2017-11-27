<div class="menu">
    <ul>
        <li><a class="current" href="./index.php">Admin Home</a></li>
    </ul>
</div>
<div class="row">
<?php
    if (!empty($_SESSION['error_message'])){
        echo '<div class="alert-danger">'.$_SESSION['error_message'].'</div>';
        $_SESSION['error_message']="";
    }

    if (!empty($_SESSION['success_message'])) {
        echo '<div class="alert-success">'.$_SESSION['success_message'].'</div>';
        $_SESSION['success_message']="";
    }
?>
</div>