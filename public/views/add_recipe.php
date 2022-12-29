<!DOCTYPE html>
<head lang="en">
    <link rel="stylesheet" type="text/css" href="public/css/add_recipe.css">
    <title>Add recipe - Cook Boy</title>
    <style>@import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;500&display=swap');</style>
</head>
<body>
    <div class="container">
        <?php include('modules/header.php') ?>
        <div class="main-content">
            <form class="recipe-container" action="addRecipe" ENCTYPE="multipart/form-data">
                <div class="tags">
                    <span>Tags:</span>
                    <input type="text" id="tag" placeholder="#">
                </div>
                <div class="recipe-info">
                    <label for="time">time:
                        <input type="time" id="time" name="time">
                    </label>
                    <label for="portions">portions:
                        <input type="number" id="portions" name="portions">
                    </label>
                </div>
                <div class="title">
                    <label for="title">
                        <input name="title" type="text" placeholder="Title">
                    </label>
                </div>
                <div class="ingredients">
                    <span>Ingredients</span>
                    <?php include('modules/new_ingredient.php') ?>
                    <button>add ingredient</button>
                </div>
                <label class="description" for="description">
                    <textarea name="description" placeholder="description" maxlength="3000"></textarea>
                </label>
                <button type="submit" id="save-btn">Save</button>
            </form>
        </div>
        <?php include('modules/footer.php') ?>
    </div>
</body>