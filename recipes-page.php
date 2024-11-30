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
        
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $cuisines = array_map('trim', explode(',', $row['cuisine']));
                $diets = array_map('trim', explode(',', $row['diet']));
        
                // Check if the recipe matches both filters (if both are selected)
                if (
                    ($selected_cuisine && in_array($selected_cuisine, $cuisines, true)) &&
                    ($selected_diet && in_array($selected_diet, $diets, true))
                ) {
                    $filtered_recipes[] = $row;
                }
                // Check if it matches only the cuisine (if diet is not selected)
                else if (
                    $selected_cuisine && !$selected_diet && in_array($selected_cuisine, $cuisines, true)
                ) {
                    $filtered_recipes[] = $row;
                }
                // Check if it matches only the diet (if cuisine is not selected)
                else if (
                    $selected_diet && !$selected_cuisine && in_array($selected_diet, $diets, true)
                ) {
                    $filtered_recipes[] = $row;
                }
                // Add all recipes if no filters are selected
                else if (!$selected_cuisine && !$selected_diet) {
                    $all_recipes[] = $row;
                }
            }
        }

        $recipes_to_display = !empty($filtered_recipes) ? $filtered_recipes : $all_recipes;


/* -------------------------- SEARCH FUNCTIONALITY -------------------------- */


        if (!empty($search_query)) {
            $filtered_recipes = array_filter($filtered_recipes, function($recipe) use ($search_query) {
                return stripos($recipe['title'], $search_query) !== false ||
                        stripos($recipe['subtitle'], $search_query) !== false ||
                        stripos($recipe['main food'], $search_query) !== false ||
                        stripos($recipe['cuisine'], $search_query) !== false ||
                        stripos($recipe['diet'], $search_query) !== false;
            });
        }

        if (empty($selected_cuisine) && empty($selected_diet)) {
            $all_recipes = array_filter($all_recipes, function($recipe) use ($search_query) {
                return stripos($recipe['title'], $search_query) !== false ||
                        stripos($recipe['subtitle'], $search_query) !== false ||
                        stripos($recipe['main food'], $search_query) !== false ||
                        stripos($recipe['cuisine'], $search_query) !== false ||
                        stripos($recipe['diet'], $search_query) !== false;
            });
        }

    ?>

    <div class="body">
        <?php include("header.php") ?>
        
<!-- -------------------------- FILTERS -------------------------- --> 

<form method="GET" action="recipes-page.php" class="filter-form">
        <!-- Cuisine Dropdown -->
        <select name="cuisine" class="dropdown" onchange="this.form.submit()">
            <option value="">All Cuisines</option>
            <option value="Mexican" <?php echo $selected_cuisine == 'Mexican' ? 'selected' : ''; ?>>Mexican</option>
            <option value="Chinese" <?php echo $selected_cuisine == 'Chinese' ? 'selected' : ''; ?>>Chinese</option>
            <option value="Italian" <?php echo $selected_cuisine == 'Italian' ? 'selected' : ''; ?>>Italian</option>
            <option value="Indian" <?php echo $selected_cuisine == 'Indian' ? 'selected' : ''; ?>>Indian</option>
            <!-- Add more cuisines as needed -->
        </select>

        <!-- Diet Dropdown -->
        <select name="diet" class="dropdown" onchange="this.form.submit()">
            <option value="">All Diets</option>
            <option value="Vegan" <?php echo $selected_diet == 'Vegan' ? 'selected' : ''; ?>>Vegan</option>
            <option value="Vegetarian" <?php echo $selected_diet == 'Vegetarian' ? 'selected' : ''; ?>>Vegetarian</option>
            <option value="Gluten Free" <?php echo $selected_diet == 'Gluten Free' ? 'selected' : ''; ?>>Gluten Free</option>
            <option value="Halal" <?php echo $selected_diet == 'Halal' ? 'selected' : ''; ?>>Halal</option>
            <!-- Add more diets as needed -->
        </select>
    </form>

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