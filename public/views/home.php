<!DOCTYPE html>
<head lang="en">
    <link rel="stylesheet" type="text/css" href="public/css/home.css">
    <title>Home - Cook Boy</title>
    <style>@import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;500&display=swap');</style>
    <script type="text/javascript" src="public/scripts/toggle-menu.js" defer></script>
</head>
<body>
    <div class="container">
        <?php include('modules/header.php')?>
        <div class="main-content">
            <div class="welcome-sign">
                <span>Welcome to Cook Boy - Your recipe manager!</span>
            </div>
            <div class="suggestions">
                <span>Suggested recipes</span>
                <div class="carousel">
                </div>
                <div class="map">
                    <button class="active first"></button>
                    <button class="second"></button>
                    <button class="third"></button>
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
        <?php include('modules/footer.php') ?>
    </div>

<template id="feature-template">
    <li>
        <div class="feature-header">
            <img src="" alt="">
            <span></span>
        </div>
        <div class="feature-text">
        </div>
    </li>
</template>
</body>