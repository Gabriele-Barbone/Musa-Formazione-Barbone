<?php
require_once "inc/functions.php";
require_once "data/data.php";
require_once "inc/header.php";
require_once "inc/navbar.php";  //NAV BAR DA SISTEMARE

if (function_exists('showProductTable') && isset($catalogo)) {
    showProductTable($catalogo);
} else {
    echo "Qualcosa è andato storto :/<br>";
}

?>
<p>loren ipsum </p>
<?php

require_once "inc/footer.php";