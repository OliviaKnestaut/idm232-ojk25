<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Culinary Compass Help</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/navigation.css">
    <link rel="icon" href="files/general-images/grey-logo.svg">
</head>
<body>
    <div class="body">
        <?php include("header.php") ?>

        <div class="title">
            <h1></h1>
        </div>

<!-- -------------------------- MAP HELP -------------------------- --> 
        
        <div class="container">
            <section class="recipe-header">
                <span id="help-map" class="header-image"></span>
                <div class="recipe-info">
                    <h2 class="recipe-title">Using the Culinary Map</h2>
                    <h3 class="recipe-subtitle">Find all your favorites at your fingertips!</h3>
                    <p class="description">On your computer hover over the different pins to learn the different cuisines. Click or tap on a region's pin to discover meals from that part of the world.<br><br>(On a mobile device try holding down on the pin!)</p>
                </div>
            </section>
        </div>

<!-- -------------------------- RECIPE CARD HELP -------------------------- --> 

        <div class="container">
            <section class="recipe-header help-section">
                <div class="recipe-info">
                    <h2 class="recipe-title">Reading a Recipe Card</h2>
                    <h3 class="recipe-subtitle">Pick the best recipe for your needs!</h3>
                    <p class="description">Our recipes are pulled from an extensive database created by travelling chef Olivia Knestaut. In order to best present these recipes to you some of the core information is shared on each recipe card. Each recipe card presents the expected cook time, servings, world cuisine, and applicable diets. We hope this information can aid you in selecting an amazing dish to cook up in your kitchen.</p>
                </div>
                <img id="card-help" src="files/general-images/card_help_screenshot.png" alt="">
            </section>
        </div>

<!-- -------------------------- SEARCH & FILTER HELP -------------------------- --> 

<div class="container">
            <section class="help-section">

                <picture>
                    <source
                    media="(min-width: 768px)"
                    srcset="files/general-images/Search_bar.png">

                    <img id="search-bar-img"
                    src="files/general-images/Search_bar_small.png"
                    alt="">
                </picture>
                <div class="recipe-info">
                    <h2 class="recipe-title">Searching and Filtering Recipes</h2>
                    <h3 class="recipe-subtitle">Find exactly what you are looking for!</h3>
                    <p class="description">Culinary Compass allows you to navigate our extensive database of recipes using three different filters: cuisine, diet, and search query. In fact, to narrow down your search and find exactly what you are looking for you are able to combine filters together to be even more specific!</p>
                </div>
            </section>
        </div>
    </div>

    <?php include("footer.php") ?>
</body>
</html>