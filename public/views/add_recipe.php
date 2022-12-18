<!DOCTYPE html>
<head lang="en">
    <link rel="stylesheet" type="text/css" href="public/css/add_recipe.css">
    <title>Add recipe - Cook Boy</title>
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
                <input class="search-bar box" type="text" placeholder="Find a recipe">
                <a class="categories-button" href="categories.html">Categories</a>
                <div class="login-buttons">
                    <button class="log-in">Log in</button>
                    <button class="sign-in">Sign in</button>
                </div>
            </nav>
        </div>
        <div class="main-content">
            <form class="recipe-container">
                <div class="tags">
                    <span>Tags</span>
                    <input type="text" id="tag">
                </div>
                <div class="recipe-info">
                    <label for="time">time:</label>
                    <input type="time" id="time">
                    <label for="portions">portions:</label>
                    <input type="number" id="portions">
                </div>
                <div class="ingredients">
                    <span>Ingredients</span>
                        <div class="new-ingredient">
                            <input type="text" id="ingredient" placeholder="ingredient">
                            <input type="text" id="quantity" placeholder="quantity">
                            <select>
                                <option>ml</option>
                                <option>l</option>
                                <option>cups</option>
                                <option>g</option>
                                <option>dg</option>
                                <option>kg</option>
                            </select>
                        </div>

                    <button type="submit">add ingredient</button>
                </div>
                <div class="description">
                    <input type="text" placeholder="description">
                </div>
            </form>
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