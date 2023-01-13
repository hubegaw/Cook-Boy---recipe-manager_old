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
            <form class="recipe-container" action="addRecipe" method="POST" ENCTYPE="multipart/form-data">
                <div class="tags">
                    <span>Tags:</span>
                    <input type="text" id="tag" placeholder="#">
                </div>
                <div class="recipe-info">
                    <label for="time">time:
                        <input type="time" required id="time" name="time">
                    </label>
                    <label for="portions">portions:
                        <input type="number" required id="portions" name="portions" min="0" max="99" maxlength="2">
                    </label>
                </div>
                <div class="title">
                    <label for="title">
                        <input name="title" type="text" required placeholder="Title" minlength="3" maxlength="100">
                    </label>
                </div>
                <div class="ingredients" id="ingredients">
                    <span>Ingredients</span>
                    <?php include('modules/new_ingredient.php') ?>
                    <div class="new-ingredients"></div>
                    <a href="javascript:void(0)" id="add-ingredient">add ingredient</a>
                </div>
                <label class="description" for="description">
                    <textarea name="description" required placeholder="description" maxlength="3000" minlength="10"></textarea>
                </label>
                <button type="submit" id="save-btn">Save</button>
            </form>
        </div>
        <?php include('modules/footer.php') ?>
    </div>

    <script>
        document.getElementById("add-ingredient").onclick = function () {
            var div = document.createElement(`<div class="new-ingredient">
                <input name="ingredient[]" type="text" id="ingredient" required placeholder="ingredient" minlength="3" maxlength="20">
                    <input name="quantity[]" type="number" id="quantity" required placeholder="quantity" min="0" max="99">
                        <select>
                            <?php if(isset($measures)) foreach($measures as $measure):?>
                            <option><?=$measure?></option>
                            <?php endforeach;?>
                        </select>
                </div>`);
            document.getElementById("ingredients").appendChild(div);
            }
    </script>
</body>