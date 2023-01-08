<!DOCTYPE html>
<head lang="en">
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    <title>Cook Boy</title>
    <style>@import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;500&display=swap');</style>
    <script type="text/javascript" src="../scripts" defer></script>
</head>
<body>
<div class="container">
    <div class="main-content">
        <div class="logo">
            <img src="public/img/header/logo.png" alt="Cook Boy logo">
        </div>
        <div class="log-in">
            <span>We are happy to see you again!</span>
            <form class="inputs" action="login" method="POST">
                <div class="messages">
                    <?php if(isset($message)) {
                        echo $message;
                    }
                    ?>
                </div>
                <div class="email">
                    <label for="email-input" class="text">Email address
                        <input class="email-input" name="email-input" type="text" placeholder="myrecipes@email.com">
                    </label>
                </div>
                <div class="password">
                    <label for="password-input" class="text">Password
                        <input class="password-input" name="password-input" type="password" placeholder="**********">
                    </label>
                </div>
                <div class="other-login-options">
                    <span>or log in with</span>
                    <button class="google button">Google</button>
                    <button class="twitter button">Twitter</button>
                    <button class="facebook button">Facebook</button>
                </div>
                <button class="log-in-button button" type="submit">Log in</button>
            </form>
            <div class="to-sign-up">
                Not registered yet?
                <button>Create an Account</button>
            </div>
        </div>
        <div class="sign-up">
            <span>Hello there, thank you for joining!</span>
            <form class="inputs" action="" method="POST">
                <div class="email">
                    <label for="email-input" class="text">Email address
                        <input name="register-email" class="email-input" type="text" placeholder="myrecipes@email.com">
                    </label>
                </div>
                <div class="password">
                    <label for="password-input" class="text">Password
                        <input name="register-password" class="password-input" type="password" placeholder="**********">
                    </label>
                </div>
                <div class="name">
                    <label for="name-input" class="text">Your name
                        <input name="register-name" class="name-input" type="text" placeholder="Adam">
                    </label>
                </div>
                <div class="other-login-options">
                    <span>or sign up with</span>
                    <button class="google button">Google</button>
                    <button class="twitter button">Twitter</button>
                    <button class="facebook button">Facebook</button>
                </div>
                <button class="sign-up-button button" type="submit">Sign up</button>
            </form>
            <div class="to-log-in">
                Already have an Account?
                <button>Log in</button>
            </div>
        </div>
    </div>
</div>
</body>