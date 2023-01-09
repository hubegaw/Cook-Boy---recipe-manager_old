<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    private $userID;

    /**
     * @throws Exception
     */
    public function getUser(string $email, string $password): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE email = :email AND password =:password
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            throw new Exception("User not found");
        }

        session_start();

        $this->userID = $user['user_id'];
        $_SESSION['user_uuid'] = $user['user_id'];
        $_SESSION['name'] = $user['name'];

        return new User(
            $user['email'],
            $user['password'],
            $user['name']
        );
    }

    public function addUser(User $user)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.users (name, email, password)
            VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $user->getName(),
            $user->getEmail(),
            $user->getPassword()
        ]);

        session_start();
    }

    public function getuserID() {
        return $this->userID;
    }
}