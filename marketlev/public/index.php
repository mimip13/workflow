<?php

session_start();

use App\Controllers\Admin\AdminController;
use App\Controllers\User\UserController;
use App\Controllers\Visitor\VisitorController;

require_once __DIR__.'/../vendor/autoload.php';


//define('URL',"http://localhost:8888/marketlev/");
define("URL", str_replace("public/", "", str_replace("index.php", "",
        (isset($_SERVER['HTTPS']) ? "https" : "http")
        . "://$_SERVER[HTTP_HOST]"
        . dirname($_SERVER['PHP_SELF'])) . '/'));

define('VIEWS_PATH', __DIR__.'/../App/Views/');

//marketlev/public/index.php?page=
//marketlev/


$visitor= new VisitorController();
$user= new UserController();
$admin=new AdminController();

try{
    if (empty($_GET["page"])){
        $visitor->home();
    }else{
        $url=explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
        switch ($url[0]){
            case "home":
                $visitor->home();
                break;
            case "login":
                $visitor->login();
                break;
            case "loginValidation" :
                $user->loginValidation();
                break;
            case "logout" :
                $user->logout();
                break;
            case "register":
                $visitor->register();
                break;
            case "registerValidation" :
                $user->registerValidation();
                break;
            case "admin":
                $admin->dashboard();
                break;
            default:
                throw new Exception("La page n'existe pas");
        }
    }
}catch (Exception $exception){
    $error=$exception->getMessage();
    include VIEWS_PATH.'error.view.php';
}

