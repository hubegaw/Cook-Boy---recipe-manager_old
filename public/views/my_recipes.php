<!DOCTYPE html>
<head lang="en">
    <link rel="stylesheet" type="text/css" href="public/css/my_recipes.css">
    <title>My recipes - Cook Boy</title>
    <style>@import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;500&display=swap');</style>
</head>
<body>
    <div class="container">
        <?php include('header.php')?>
        <div class="main-content">
            <div class="panel flexbox">
                <div class="recipes-count">You have</div>
                <div class="create-recipe">
                    <a href="views/add_recipe.html">Create new recipe</a>
                </div>
                <div class="filters">
                    <button>Filters</button>
                </div>
            </div>
            <div class="recipes-container">
                <ul>
                    <li class="recipe-tile">
                        <div class="name">Recipe title</div>
                        <div class="info">
                            <div class="rating"></div>
                            <span class="cooking-time">time: </span>
                            <span class="portions">portions: </span>
                        </div>
                        <button class="delete-button">
                            <img src="public/img/common/delete.png" alt="delete button">
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <?php include('footer.php')?>
    </div>
</body>