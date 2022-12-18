<!DOCTYPE html>
<head lang="en">
    <link rel="stylesheet" type="text/css" href="public/css/add_recipe.css">
    <title>Add recipe - Cook Boy</title>
    <style>@import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;500&display=swap');</style>
</head>
<body>
    <div class="container">
        <?php include('header.php')?>
        <div class="main-content">
            <form class="recipe-container">
                <div class="tags">
                    <span>Tags:</span>
                    <input type="text" id="tag" placeholder="|">
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
        <?php include('footer.php')?>
    </div>
</body>