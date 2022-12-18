<!DOCTYPE html>
<head lang="en">
    <link rel="stylesheet" type="text/css" href="public/css/home.css">
    <title>Home - Cook Boy</title>
    <style>@import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;500&display=swap');</style>
</head>
<body>
    <div class="container">
        <div class="header flexbox">
            <a class="logo-container flexbox" href="#">
                <img src="public/img/header/logo.png" alt="Cook Boy logo">
                <div class="app-name">Cook Boy</div>
            </a>
            <nav class="navigation flexbox">
                <label for="search-bar">
                    <input class="search-bar" name="search-bar" type="text" placeholder="Find a recipe">
                </label>
                <a href="./categories.php">Categories</a>
                <a href="./my_recipes.php">My recipes</a>
                <a href="./add_recipe.php">Add recipe</a>
            </nav>
        </div>
        <div class="main-content">
            <div class="welcome-sign">
                <span>Welcome to Cook Boy - Your recipe manager!</span>
            </div>
            <div class="suggestions">
                <span>Suggested recipes</span>
                <div class="carousel">
                </div>
            </div>
            <div class="features-container">
                <span class="features-header">Features</span>
                <ul class="features">
                    <li>
                        <div class="feature-header">
                            <img src="public/img/features/categories.png" alt="categories">
                            <span>Filters and tags</span>
                        </div>
                        <div class="feature-text">
                            Easily organise your recipes by tags
                            and quickly find them with use of filters
                        </div>
                    </li>
                    <li>
                        <div class="feature-header">
                            <img src="public/img/features/cloud.png" alt="cloud">
                            <span>Import from cloud</span>
                        </div>
                        <div class="feature-text">
                            Multiple ready recipes
                            are available in our application
                        </div>
                    </li>
                    <li>
                        <div class="feature-header">
                            <img src="public/img/features/measuring-cup.png" alt="measuring-cup">
                            <span>Conversion</span>
                        </div>
                        <div class="feature-text">
                            Convert ingredients between US,
                            Imperial and metric measures
                        </div>
                    </li>
                </ul>
                <button class="more-button">more</button>
            </div>
        </div>
        <div class="footer flexbox">
            <ul class="flexbox">
                <li>
                    <a href="#">About Us</a>
                </li>
                <li>
                    <span>Contact:</span>
                    <span class="email">cookboyrecipes@contact.com</span>
                </li>
                <li>
                    <a href="#">Help</a>
                </li>
            </ul>
            <span class="legal">@2022 All rights reserved</span>
        </div>
    </div>
</body>