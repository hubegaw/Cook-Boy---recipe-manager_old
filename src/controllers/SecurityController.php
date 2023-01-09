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

    /**
     * @throws Exception
     */
    public function login()
    {
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email-input'];
        $password = $_POST['password-input'];

        $user = $this->userRepository->getUser($email, $password);

        if (!$user) {
            return $this->render('login', ['messages' => ['User not found!']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if ($user->getPassword() !== $password) {
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

        $name = $_POST['name'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        if (password_needs_rehash($hashedPassword, PASSWORD_BCRYPT))
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $user = new User($email, $password, $name);

        $this->userRepository->addUser($user);

        return $this->render('login', ['messages' => ['You\'ve been successfully registered!']]);
    }

    public function logout()
    {
        session_destroy();
        return $this->render('login', ['messages' => ['You have been logged out successfully']]);
    }
}