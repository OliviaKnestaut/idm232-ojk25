<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/navigation.css">
</head>
<body>

<!-- -------------------------- DATABASE SETUP & CONNECTIONS -------------------------- --> 

    <?php

        include 'database-connection.php'; 

        $selected_cuisine = isset($_GET['cuisine']) ? trim($_GET['cuisine']) : '';
        $selected_diet = isset($_GET['diet']) ? trim($_GET['diet']) : '';
        $search_query = isset($_GET['search']) ? trim($_GET['search']) : '';


        $sql_query = "SELECT * FROM `idm_232`";
        $result = mysqli_query($connection, $sql_query);


        $filtered_recipes = [];
        $all_recipes = [];

        //Identify diet or cuisine queries
        
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                $cuisines = array_map('trim', explode(',', $row['cuisine']));
                $diets = array_map('trim', explode(',', $row['diet']));
                
                if (
                    ($selected_cuisine && in_array($selected_cuisine, $cuisines, true)) ||
                    ($selected_diet && in_array($selected_diet, $diets, true))
                ) {
                    $filtered_recipes[] = $row;
                } else if (empty($selected_cuisine) && empty($selected_diet)){
                    $all_recipes[] = $row;
                }
            }
        }

/* -------------------------- SEARCH FUNCTIONALITY -------------------------- */


        if (!empty($search_query)) {
            $filtered_recipes = array_filter($filtered_recipes, function($recipe) use ($search_query) {
                return stripos($recipe['title'], $search_query) !== false ||
                        stripos($recipe['subtitle'], $search_query) !== false ||
                        stripos($recipe['cuisine'], $search_query) !== false ||
                        stripos($recipe['diet'], $search_query) !== false;
            });
        }

        if (empty($selected_cuisine) && empty($selected_diet)) {
            $all_recipes = array_filter($all_recipes, function($recipe) use ($search_query) {
                return stripos($recipe['title'], $search_query) !== false ||
                        stripos($recipe['subtitle'], $search_query) !== false ||
                        stripos($recipe['cuisine'], $search_query) !== false ||
                        stripos($recipe['diet'], $search_query) !== false;
            });
        }

    ?>

    <div class="body">
        <?php include("header.php") ?>
        
<!-- -------------------------- SEARCH BAR -------------------------- --> 

        <form  class="search-container" action="recipes-page.php" method="get">
            <input type="text" class="search-input" name="search" placeholder="Search...">
            <button class="button" type="submit">SEARCH</button>

            <?php if (!empty($selected_diet)){ ?>
                <input type="hidden" name="diet" value="<?php echo $selected_diet; ?>">
            <?php } else if (!empty($selected_cuisine)){ ?>
                <input type="hidden" name="cuisine" value="<?php echo $selected_cuisine; ?>">
            <?php } ?>
        </form>

<!-- -------------------------- PAGE TITLE -------------------------- --> 

        <div class="title">
            <h1><?php 
                    if ($selected_cuisine) {
                        echo ($selected_cuisine);
                    } elseif ($selected_diet) {
                        echo ($selected_diet);
                    } else {
                        echo "All";
                    }
                ?> Recipes</h1>
        </div>

<!-- -------------------------- DISPLAY RECIPES -------------------------- --> 

        <div class="recipe-grid">
            
            <?php
            //By Search Result
            if (!empty($search_results)){
                foreach ($search_results as $recipe){
                    include("recipe-card.php");
                } 
            //By Filter
            } else if (!empty($filtered_recipes) && $selected_diet !== "None"){
                foreach ($filtered_recipes as $recipe){
                    include("recipe-card.php");  
                }
            //Display All
            } else {
                foreach ($all_recipes as $recipe){
                    include("recipe-card.php");    
                }
            } ?>
                
        </div>
    </div>


    <?php
        include("footer.php");
        mysqli_close($connection);
    ?>

    
</body>
</html>