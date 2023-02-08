<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController {
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login()
    {
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email-input'];
        $password = md5($_POST['password-input']);

        try {
            $user = $this->userRepository->getUser($email, $password);
        } catch (Exception $error) {
            return $this->render('login', ["messages" => [$error->getMessage()]]);
        }

        if ($password != $user->getPassword()) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/home");
    }

    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $name = $_POST['register-name'];
        $password = $_POST['register-password'];
        $email = $_POST['register-email'];

        if($name == null || $password == null || $email == null) {
            return $this->render('login', ['messages' => ['Please, fill all inputs!']]);
        }

        $user = new User($email, md5($password), $name);

        $this->userRepository->addUser($user);

        return $this->render('login', ['messages' => ['Please, now log in!']]);
    }

    public function logout()
    {
        session_destroy();
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
    }
}