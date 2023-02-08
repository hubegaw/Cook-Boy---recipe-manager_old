<!DOCTYPE html>
<head lang="en">
    <title>Recipe - Cook Boy</title>
    <link rel="stylesheet" type="text/css" href="public/css/recipe_style.css">
    <style>@import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;500&display=swap');</style>
    <script type="text/javascript" src="public/scripts/toggle-menu.js" defer></script>
</head>
<body>
<div class="container">
    <?php include('modules/header.php') ?>
    <div class="main-content">
        <div class="do-buttons">
            <button id="edit">edit</button>
            <form action="deleteRecipe" method="GET"><button id="delete">delete</button></form>
        </div>
        <form class="recipe-container" action="getRecipe" method="GET">
            <?php if(isset($recipe)) ?>
            <div class="tags">
                <span>tags: </span>
                <span></span>
            </div>
                <div class="recipe-info">
                    <span class="time">time: <?php $time = $recipe->getTime();
                        $hour = substr($time,0,2);
                        $minute = substr($time,3,2);
                        if(substr($hour,0,1) == "0") $hour = substr($hour,1,1);
                        if(substr($minute,0,1) == "0") $minute = substr($minute,1,1);

                        if($hour === "0" || $hour === "00") {
                            echo $minute . " min";
                        } else {
                            if($minute === "0" || $minute === "00") echo $hour . " h";
                            echo $hour . " h  " . $minute . " min";
                        }
                        ?></span>
                 <span class="portions">portions: <?= $recipe->getPortions()?></span>
                </div>
            <div class="title">
                <span><?= $recipe->getTitle()?></span>
            </div>
            <div class="ingredients">
                <span>Ingredients</span>
                <?php foreach($recipe->getIngredients() as $ingredient):?>
                    <span id="ingredient-container"><?= $ingredient->getName()?>
                        <span id="quantity-container"><?= $ingredient->getQuantity() . " " . $ingredient->getMeasure()?></span>
                    </span>
                <?php endforeach;?>
            </div>
            <div class="description"><?= $recipe->getDescription()?></div>
        </form>
    </div>
    <?php include('modules/footer.php') ?>
</div>
</body>
