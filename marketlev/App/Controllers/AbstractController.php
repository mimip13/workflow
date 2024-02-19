<?php

namespace App\Controllers;

abstract class AbstractController{
    public function render(string $viewName,array $data=[], string $template='user'): void
    {
        ob_start();
        extract($data);
        include VIEWS_PATH.$viewName.'.php';
        $content=ob_get_clean();

        //choix du template en fonction du role
        $templateFile= $template === 'admin' ? 'Admin/templateAdmin.php':'template.php';
        include VIEWS_PATH. $templateFile;
    }
    public  function  redirectToRoute(string $route): void
    {
        header("Location: ".URL.$route);
        exit();
    }
}