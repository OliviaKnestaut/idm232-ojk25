<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/navigation.css">
    <link rel="icon" href="files/general-images/grey-logo.svg">
</head>
<body>

<!-- -------------------------- DATABASE SETUP & CONNECTIONS -------------------------- --> 

    <?php

        require_once 'includes/db.php';

        $selected_cuisine = isset($_GET['cuisine']) ? trim($_GET['cuisine']) : '';
        $selected_diet = isset($_GET['diet']) ? trim($_GET['diet']) : '';
        $search_query = isset($_GET['search']) ? trim($_GET['search']) : '';

        $sql_query = "SELECT * FROM `idm_232`";
        $result = mysqli_query($connection, $sql_query);

        $filtered_recipes = [];
        $all_recipes = [];


// ------------------------------------- FILTER LOGIC --------------------------------------

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $cuisines = array_map('trim', explode(',', $row['cuisine']));
        $diets = array_map('trim', explode(',', $row['diet']));

        $matches_cuisine = !$selected_cuisine || in_array($selected_cuisine, $cuisines, true);
        $matches_diet = !$selected_diet || in_array($selected_diet, $diets, true);
        $matches_search = !$search_query || (
            stripos($row['title'], $search_query) !== false ||
            stripos($row['subtitle'], $search_query) !== false ||
            stripos($row['main food'], $search_query) !== false ||
            stripos($row['cuisine'], $search_query) !== false ||
            stripos($row['diet'], $search_query) !== false
        );

        if (empty($selected_cuisine) && empty($selected_diet) && empty($search_query)) {
            $all_recipes[] = $row;
        }
        // Check if recipe matches all active filters
        else if ($matches_cuisine && $matches_diet && $matches_search) {
            $filtered_recipes[] = $row;
        }
    }
} ?>


<div class="body">
    <?php include("header.php") ?>

<!-- -------------------------- FILTERS -------------------------- --> 

    <div class="search-container">
        <form method="GET" action="recipes-page.php" class="filter-form">
            <!-- Cuisine Dropdown -->
            <select name="cuisine" class="dropdown search-input <?php echo ($selected_cuisine); ?>" onchange="this.form.submit()">
                <option value="">All Cuisines</option>
                <option class="search-input" value="American" <?php echo $selected_cuisine == 'American' ? 'selected' : ''; ?>>American</option>
                <option class="search-input" value="Asian-Fusion" <?php echo $selected_cuisine == 'Asian-Fusion' ? 'selected' : ''; ?>>Asian-Fusion</option>
                <option class="search-input" value="Chinese" <?php echo $selected_cuisine == 'Chinese' ? 'selected' : ''; ?>>Chinese</option>
                <option class="search-input" value="French" <?php echo $selected_cuisine == 'French' ? 'selected' : ''; ?>>French</option>
                <option class="search-input" value="Indian" <?php echo $selected_cuisine == 'Indian' ? 'selected' : ''; ?>>Indian</option>
                <option class="search-input" value="Italian" <?php echo $selected_cuisine == 'Italian' ? 'selected' : ''; ?>>Italian</option>
                <option class="search-input" value="Japanese" <?php echo $selected_cuisine == 'Japanese' ? 'selected' : ''; ?>>Japanese</option>
                <option class="search-input" value="Korean" <?php echo $selected_cuisine == 'Korean' ? 'selected' : ''; ?>>Korean</option>
                <option class="search-input" value="Mediterranean" <?php echo $selected_cuisine == 'Mediterranean' ? 'selected' : ''; ?>>Mediterranean</option>
                <option class="search-input" value="Mexican" <?php echo $selected_cuisine == 'Mexican' ? 'selected' : ''; ?>>Mexican</option>
                <option class="search-input" value="Middle Eastern" <?php echo $selected_cuisine == 'Middle Eastern' ? 'selected' : ''; ?>>Middle Eastern</option>
                <option class="search-input" value="Seasonal" <?php echo $selected_cuisine == 'Seasonal' ? 'selected' : ''; ?>>Seasonal</option>
                <option class="search-input" value="Seafood" <?php echo $selected_cuisine == 'Seafood' ? 'selected' : ''; ?>>Seafood</option>
                <option class="search-input" value="Southern-Style" <?php echo $selected_cuisine == 'Southern-Style' ? 'selected' : ''; ?>>Southern-Style</option>
                <option class="search-input" value="Thai" <?php echo $selected_cuisine == 'Thai' ? 'selected' : ''; ?>>Thai</option>
            </select>

            <!-- Diet Dropdown -->
            <select name="diet" class="dropdown search-input <?php echo ($selected_diet); ?>" onchange="this.form.submit()">
                <option value="">All Diets</option>
                <option class="search-input" value="Gluten Free" <?php echo $selected_diet == 'Gluten Free' ? 'selected' : ''; ?>>Gluten Free</option>
                <option class="search-input" value="Halal" <?php echo $selected_diet == 'Halal' ? 'selected' : ''; ?>>Halal</option>
                <option class="search-input" value="Pescatarian" <?php echo $selected_diet == 'Pescatarian' ? 'selected' : ''; ?>>Pescatarian</option>
                <option class="search-input" value="Spicy" <?php echo $selected_diet == 'Spicy' ? 'selected' : ''; ?>>Spicy</option>
                <option class="search-input" value="Vegan" <?php echo $selected_diet == 'Vegan' ? 'selected' : ''; ?>>Vegan</option>
                <option class="search-input" value="Vegetarian" <?php echo $selected_diet == 'Vegetarian' ? 'selected' : ''; ?>>Vegetarian</option>
            </select>
        </form>

<!-- -------------------------- SEARCH BAR -------------------------- --> 

        <form action="recipes-page.php" method="get">
            <input type="text" class="search-input search" name="search" placeholder="Search...">
            <button class="button" type="submit">SEARCH</button>

            <?php if (!empty($selected_diet) && !empty($selected_cuisine)){ ?>
                <input type="hidden" name="diet" value="<?php echo $selected_diet; ?>">
                <input type="hidden" name="cuisine" value="<?php echo $selected_cuisine; ?>">
            <?php } else if (!empty($selected_diet)){ ?>
                <input type="hidden" name="diet" value="<?php echo $selected_diet; ?>">
            <?php } else if (!empty($selected_cuisine)){ ?>
                <input type="hidden" name="cuisine" value="<?php echo $selected_cuisine; ?>">
            <?php } ?>
        </form>
    </div>

<!-- -------------------------- PAGE TITLE -------------------------- --> 

    <div class="title">
        <h1><?php 
                if ((!empty($search_query) || !empty($selected_cuisine) || !empty($selected_diet)) && empty($filtered_recipes)) {
                    echo "No Recipes Found";
                } elseif ($selected_cuisine) {
                    echo ($selected_cuisine). " Recipes";
                } elseif ($selected_diet) {
                    echo ($selected_diet). " Recipes";
                } elseif ($search_query){
                    echo "\"".($search_query)."\" Recipes";
                } else {
                    echo "All Recipes";
                } ?>
        </h1>
    </div>

<!-- -------------------------- DISPLAY RECIPES -------------------------- --> 

    <div class="recipe-grid">

        <?php
        //By Filters
        if (!empty($filtered_recipes) && $selected_diet !== "None"){
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