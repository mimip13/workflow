<?php

namespace App\Controllers\Visitor;
use App\Controllers\AbstractController;
use App\Controllers\SecurityController;

class VisitorController extends AbstractController {

    private SecurityController $security;

    public function __construct()
    {
        $this->security=new SecurityController();
    }


    public function home(): void
    {
        $title="Accueil";
        $this->render("Visitor/home.view",[
            'title'=>$title
            ]);
    }

    public function login(): void
    {
        $title="Se connecter";
        $this->render("Visitor/login.view", [
            'title'=>$title
        ]);
    }

    public function register(): void
    {
        $title="S'inscrire";
        $token=$this->security->generateCsrfToken();
        $this->render("Visitor/register.view", [
            'title'=>$title,
            'token'=>$token
        ]);
    }
}