<?php
$request = $_SERVER['REQUEST_URI'];
$request = strpos($request, "?") !== FALSE ? substr($request, 0, strpos($request, "?")) : $request;
switch ($request) {
    case '/' :
        require_once 'index.php';
        break;
    case '/o-inwestycji' :
        require_once 'about.php';
        break;
    case '/galeria' :
        require_once 'gallery.php';
        break;
    case '/lokalizacja' :
        require_once 'localisation.php';
        break;
    case '/kontakt' :
        require_once 'contact.php';
        break;
    case '/login' :
    require_once 'login.php';
    break;
}
?>