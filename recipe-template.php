<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Template</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/navigation.css">
    <link rel="icon" href="files/general-images/grey-logo.svg">
</head>
<body>

    <div class="body">

<!-- -------------------------- DATABASE SETUP & CONNECTIONS -------------------------- --> 

        <?php
        include("header.php");
        require_once 'includes/db.php';


        $recipe_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        if ($recipe_id > 0) {

            $sql_query = "SELECT * FROM `idm_232` WHERE recipe = $recipe_id";
            $result = mysqli_query($connection, $sql_query);
        
            if ($result && mysqli_num_rows($result) > 0) {
                $recipe = mysqli_fetch_assoc($result);

        ?>

        <div class="title">
            <h1></h1>
        </div>
        
        <div class="container">

<!-- -------------------------- RECIPE HEADER SECTION -------------------------- --> 

            <section class="recipe-header">
                <span class="header-image" style="background-image: url('<?php echo ($recipe["main image"]); ?>') !important"></span>
                <div class="recipe-info">
                    <h2 class="recipe-title"><?php echo ($recipe["title"]); ?></h2>
                    <h3 class="recipe-subtitle"><?php echo ($recipe["subtitle"]); ?></h3>
                    <div class="recipe-details">
                        <div>
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
                        </div>
                        <div>
                            <div class="cuisine">
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
                    <p class="description"><?php echo ($recipe["description"]); ?></p>
                </div>
            </section>
        </div>

        <main class="recipe-content">

<!-- -------------------------- INGREDIENT SIDEBAR -------------------------- --> 

            <aside class="ingredients container">
                <img src="<?php echo ($recipe["ingredients image"]); ?>" alt="Ingredients Image" class="ingredients-image">
                <div>
                    <h2 class="recipe-title">Ingredients</h2>
                    <ul>
                        <?php 
                        $ingredients = preg_split("/\r\n|\n|\r/", $recipe["ingredients"]);
                        foreach ($ingredients as $ingredient): 
                        ?>

                        <li><?php echo ($ingredient); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </aside>
            <?php
            $step_images_small_array = explode(",", $recipe["step images small"]);
            $step_images_large_array = explode(",", $recipe["step images large"]);
            $steps_array = explode("*", $recipe["steps"]);
            ?>

<!-- -------------------------- STEPS & IMAGES -------------------------- --> 

            <section class="recipe-steps container">
                <h2 class="recipe-title">Instructions</h2>
                <ul>

                <?php
                foreach ($steps_array as $index => $step) {

                $step_parts = explode("--", $step);
                $step_title = isset($step_parts[0]) ? trim($step_parts[0]) : '';
                $step_description = isset($step_parts[1]) ? trim($step_parts[1]) : '';

                $step_image_small = isset($step_images_small_array[$index]) ? trim($step_images_small_array[$index]) : '';
                $step_image_large = isset($step_images_large_array[$index]) ? trim($step_images_large_array[$index]) : '';

                ?>

                <li>
                    <picture>
                        <source
                        media="(min-width: 500px)"
                        srcset="<?php echo ($step_image_large); ?>">

                        <img
                        src="<?php echo ($step_image_small); ?>"
                        alt="">
                    </picture>

                    <div class="step-title">
                        <h1 class="step-num"><?php echo ($index + 1); ?></h1>
                        <h4><?php echo ($step_title); ?></h4>
                    </div>
                    <p>
                        <?php echo ($step_description); ?>
                    </p>
                </li>
                <?php } ?>
            
                </ul>
            </section>
        </main>
        <?php
        } else { ?>
            <p class="error">Recipe not found</p>
        <?php }
        } else { ?>
            <p class="error">Invalid recipe ID</p>
        <?php } ?>
    </div>

    <?php
        include("footer.php");
        mysqli_close($connection);
    ?>
    
</body>
</html>