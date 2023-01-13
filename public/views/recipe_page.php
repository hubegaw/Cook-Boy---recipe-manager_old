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
        <form class="recipe-container" action="getRecipe" ENCTYPE="multipart/form-data" method="GET">
            <?php if(isset($recipe)) ?>
            <div class="tags">
                <span>Tags:</span>
                <input type="text" id="tag" placeholder="#">
            </div>
            <div class="recipe-info">
                <label for="time">time:</label>
                <input type="time" id="time">
                <label for="portions">portions:</label>
                <input type="number" id="portions">
            </div>
            <div class="title">
                <input type="text" placeholder="Title">
            </div>
            <div class="ingredients">
                <span>Ingredients</span>
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