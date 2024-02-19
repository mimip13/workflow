<?php

namespace App\Controllers\User;
use App\Controllers\AbstractController;
use App\Controllers\DisplayController;
use App\Controllers\SecurityController;
use App\Models\Entity\User;
use App\Models\Manager\UserManager;

class UserController extends AbstractController {
    private SecurityController $security;
    private UserManager $userManager;

    public function __construct()
    {
        $this->security=new SecurityController();
        $this->userManager=new UserManager();
    }

    public function registerValidation(): void
    {
        $firstname= $this->security->cleanInput($_POST['firstname']);
        $email= $this->security->cleanInput($_POST['email']);
        $password= $this->security->cleanInput($_POST['password']);
        $confirmPassword = $this->security->cleanInput($_POST['confirm_password']);
        $csrfToken=$this->security->cleanInput($_POST['csrf_token']);

        if (!$this->security->verifyCsrfToken($csrfToken)){
            DisplayController::messageAlert("Veuillez réessayer plus tard", DisplayController::ROUGE);
            $this->redirectToRoute("register");
        }

        if ($firstname==false || $email==false || $password==false || $confirmPassword==false){
            DisplayController::messageAlert("Tous les champs sont requis", DisplayController::ROUGE);
            $this->redirectToRoute("register");
        }

        if (!filter_var($email , FILTER_VALIDATE_EMAIL)){
            DisplayController::messageAlert("Email non valide", DisplayController::ROUGE);
            $this->redirectToRoute("register");
        }

        if ($password !== $confirmPassword){
            DisplayController::messageAlert("MDP correspondent pas", DisplayController::ROUGE);
            $this->redirectToRoute("register");
        }

        $user= new User($firstname, $email, $password, 'user');
        $valid=$this->userManager->insertUser($user);
        if ($valid){
            DisplayController::messageAlert("Inscription réussie", DisplayController::VERTE);
            $this->redirectToRoute("home");
        }else{
            DisplayController::messageAlert("Erreur lors de l'inscription", DisplayController::ROUGE);
            $this->redirectToRoute("register");
        }
    }

    public function loginValidation(){
        $email= $this->security->cleanInput($_POST['email']);
        $password= $this->security->cleanInput($_POST['password']);
        if ($email==false || $password==false){
            DisplayController::messageAlert("Tous les champs sont requis", DisplayController::ROUGE);
            $this->redirectToRoute("login");
        }
        $email= filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        if ($email==false || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            DisplayController::messageAlert("Email non valide", DisplayController::ROUGE);
            $this->redirectToRoute("login");
        }
        $minLength=8;
        $maxLength=50;
        $containsLetter=preg_match('/[a-zA-Z]/', $password);
        if (strlen($password) < $minLength || strlen($password)>$maxLength || !$containsLetter){
            DisplayController::messageAlert("Respecter le format du mot de passe", DisplayController::ROUGE);
            $this->redirectToRoute("login");
        }
        //chercher le user en fonction email
        $valid=$this->userManager->verifyPassword($email,$password);
        if ($valid){
            session_regenerate_id();
            $user=$this->userManager->getUserByEmail($email);
            $_SESSION['user']=$user;
            if ($user['role']==='admin'){
                $this->redirectToRoute('admin');
            }
            $this->redirectToRoute("home");
        }else{
            DisplayController::messageAlert("Identifiants incorrects", DisplayController::ROUGE);
            $this->redirectToRoute("login");
        }

    }

    public function logout(): void
    {
        $_SESSION=[];
        session_destroy();
        $this->redirectToRoute("home");
    }


}