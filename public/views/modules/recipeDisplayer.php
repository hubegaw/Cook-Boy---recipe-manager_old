<?php if(isset($recipes))
    foreach ($recipes as $recipe): ?>
        <a href="my_recipes.php?id=<?php $recipe->getRecipeID(); ?>" class="recipe-tile">
            <div class="recipe-image">
                <img src="public/img/common/default-dish.png">
            </div>
            <div class="name">
                <?= $recipe-> getTitle();?>
            </div>
            <div class="info">
                <div class="time">time:
                    <?php $time = substr(strval($recipe-> getTime()),0,-3);
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
                    ?>
                </div>
                <div class="portions">portions: <?= $recipe-> getPortions();?></div>
            </div>
        </a>
    <?php endforeach; ?>
