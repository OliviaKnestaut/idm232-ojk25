<div class="recipe-card">
    <a href="recipe-template.php?id=<?php echo $recipe['recipe']; ?>">
        <div class="recipe-image" style="background-image: url('<?php echo ($recipe["main image"]); ?>') !important"></div>
    </a>
    <div class="recipe-content">
        <a href="recipe-template.php?id=<?php echo $recipe['recipe']; ?>"">
            
            <h2 class="recipe-title"><?php echo ($recipe["title"]); ?></h2>
            <h3 class="recipe-subtitle"><?php echo ($recipe["subtitle"]); ?></h3>
        </a>
        <div class="recipe-details">
            <div class="cook-time">
                <h4>Cook Time</h4>
                <img class="cook-time-img" src="files/icons/<?php echo ($recipe["cook time"]); ?>-min.svg" alt="">
                <p><?php echo ($recipe["cook time"]); ?> Min</p>
            </div>
            <div class="servings">
                <h4>Servings</h4>

                <?php
                    $servings = (int)$recipe["servings"];
                    for ($i = 0; $i < $servings; $i++): 
                    ?>
                    <img class="serving-img" src="files/icons/person.svg" alt="">
                <?php endfor; ?>
                <p><?php echo ($recipe["servings"]); ?></p>
            </div>
            <div class="cuisine" >
                <h4>Cuisine</h4>
                <div>
                <?php 
                    // Split the cuisine string by commas and loop through each item
                    $cuisines = explode(",", $recipe["cuisine"]);
                    foreach ($cuisines as $cuisine): 
                ?>
                    <a class="cuisine-item <?php echo ($cuisine); ?>" href="recipes-page.php?cuisine=<?php echo urlencode(trim($cuisine)); ?>"><?php echo ($cuisine); ?></a>
                
                <?php endforeach; ?>
                </div>

            </div>
            <div class="diet">
                <h4>Diet</h4>
                <div>
                <?php 
                    $diets = explode(",", $recipe["diet"]);
                    foreach ($diets as $diet): 
                ?>
                    <a class="diet-item <?php echo ($diet); ?>"
                        <?php if($diet !== "None"){ ?>
                            href="recipes-page.php?diet=<?php echo urlencode(trim($diet)); ?>"
                        <?php } ?>
                    ><?php echo ($diet); ?></a>
                <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>
</div>