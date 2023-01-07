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
            <form class="recipe-container" action="addRecipe" ENCTYPE="multipart/form-data" method="POST">
                <div class="tags">
                    <span>Tags:</span>
                    <input type="text" id="tag" placeholder="#">
                </div>
                <div class="recipe-info">
                    <label for="time">time:
                        <input type="time" required id="time" name="time">
                    </label>
                    <label for="portions">portions:
                        <input type="number" required id="portions" name="portions" min="0" max="99">
                    </label>
                </div>
                <div class="title">
                    <label for="title">
                        <input name="title" type="text" required placeholder="Title" minlength="3" maxlength="100">
                    </label>
                </div>
                <div class="ingredients">
                    <span>Ingredients</span>
                    <?php include('modules/new_ingredient.php') ?>
                    <div class="new-ingredients"></div>
                    <a href="javascript:void(0)" class="add-ingredient">add ingredient</a>
                </div>
                <label class="description" for="description">
                    <textarea name="description" required placeholder="description" maxlength="3000" minlength="10"></textarea>
                </label>
                <button type="submit" id="save-btn">Save</button>
            </form>
        </div>
        <?php include('modules/footer.php') ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.add-ingredient', function() {
                $('.new-ingredients').append('<div class="new-ingredient">\
                    <input name="ingredient[]" type="text" id="ingredient" required placeholder="ingredient" minlength="3" maxlength="20">\
                    <input name="quantity[]" type="number" id="quantity" required placeholder="quantity" min="0" max="99">\
                    <select>\
                    <option>piece</option>\
                    <option>pieces</option>\
                    <option>ml</option>\
                    <option>l</option>\
                    <option>cup</option>\
                    <option>cups</option>\
                    <option>g</option>\
                    <option>dg</option>\
                    <option>kg</option>\
                </select>\
                </div>');
            });
        });
    </script>
</body>