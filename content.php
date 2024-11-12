<?php
if (isset($_GET['page'])) {
    include('./pages/' . $_GET['page'] . '.php');
}else {
    include('./pages/home.php');
}
?>
