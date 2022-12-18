<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';

class SecurityController extends AppController {

    public function login()
    {   
        $user = new User('hubert.gawczynski@gmail.com', 'admin', 'Hubert');

        if (!$this->isPost()) {
            return $this->render('index');
        }

        $email = $_POST['email-input'];
        $password = $_POST['password-input'];

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/home");
    }
}