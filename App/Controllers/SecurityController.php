<?php

namespace App\Controllers;

class SecurityController{
    //verif, nettoyage, failles, authentification
    public function cleanInput($data): false|string
    {
        if (!isset($data) || empty($data)){
            return false;
        }
        return htmlspecialchars(trim($data));
    }

    //CSRF
    public function generateCsrfToken(): string
    {
        $_SESSION['csrf_token']=bin2hex(random_bytes(32));
        return $_SESSION['csrf_token'];
    }

    public function verifyCsrfToken(string $token): bool
    {
        $tokenIsValid= isset($_SESSION['csrf_token']) && $_SESSION['csrf_token']===$token;
        return $tokenIsValid;
    }
}