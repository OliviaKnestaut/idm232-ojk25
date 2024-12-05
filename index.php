<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IDM-232 PHP Site</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/navigation.css">
    <link rel="stylesheet" href="css/map.css">
    <link rel="icon" href="files/general-images/grey-logo.svg">
</head>
<body>

    <div class="body">
        <?php include("header.php") ?>

<!-- -------------------------- SITE TITLE -------------------------- --> 

        <div class="title">
            <h1>CULINARY COMPASS</h1>
            <h3>Your passport to recipes from every corner of the world</h3>
        </div>

<!-- -------------------------- WORLD MAP w/ PINS-------------------------- --> 

        <div class="world-map">
            <span class="pin pin1">
                <a class="map-pin" href="recipes-page.php?cuisine=Mexican"><img class="map-pin" src="files/icons/yellow-pin.svg" alt="Yellow pin in Mexico"></a>
                <span class="popup">Mexican</span>
            </span>
            <span class="pin pin2">
                <a class="map-pin" href="recipes-page.php?cuisine=American"><img class="map-pin" src="files/icons/yellow-pin.svg" alt="Yellow pin in America"></a>
                <span class="popup">American</span>
            </span>
            <span class="pin pin3">
                <a class="map-pin" href="recipes-page.php?cuisine=French"><img class="map-pin" src="files/icons/yellow-pin.svg" alt="Yellow pin in France"></a>
                <span class="popup">French</span>
            </span>
            <span class="pin pin4">
                <a class="map-pin" href="recipes-page.php?cuisine=Italian"><img class="map-pin" src="files/icons/yellow-pin.svg" alt="Yellow pin in Italy"></a>
                <span class="popup">Italian</span>
            </span>
            <span class="pin pin5">
                <a class="map-pin" href="recipes-page.php?cuisine=Mediterranean"><img class="map-pin" src="files/icons/yellow-pin.svg" alt="Yellow pin in the Mediterranean Sea"></a>
                <span class="popup">Mediterranean</span>
            </span>
            <span class="pin pin6">
                <a class="map-pin" href="recipes-page.php?cuisine=Middle+Eastern"><img class="map-pin" src="files/icons/yellow-pin.svg" alt="Yellow pin in the Middle East"></a>
                <span class="popup">Middle Eastern</span>
            </span>
            <span class="pin pin7">
                <a class="map-pin" href="recipes-page.php?cuisine=Indian"><img class="map-pin" src="files/icons/yellow-pin.svg" alt="Yellow pin in India"></a>
                <span class="popup">Indian</span>
            </span>
            <span class="pin pin8">
                <a class="map-pin" href="recipes-page.php?cuisine=Thai"><img class="map-pin" src="files/icons/yellow-pin.svg" alt="Yellow pin in Thailand"></a>
                <span class="popup">Thai</span>
            </span>
            <span class="pin pin9">
                <a class="map-pin" href="recipes-page.php?cuisine=Asian-Fusion"><img class="map-pin" src="files/icons/yellow-pin.svg" alt="Yellow pin in Asia"></a>
                <span class="popup">Asian Fusion</span>
            </span>
            <span class="pin pin10">
                <a class="map-pin" href="recipes-page.php?cuisine=Korean"><img class="map-pin" src="files/icons/yellow-pin.svg" alt="Yellow pin in Korea"></a>
                <span class="popup">Korean</span>
            </span>
            <span class="pin pin11">
                <a class="map-pin" href="recipes-page.php?cuisine=Japanese"><img class="map-pin" src="files/icons/yellow-pin.svg" alt="Yellow pin in Japan"></a>
                <span class="popup">Japanese</span>
            </span>
            <span class="pin pin12">
                <a class="map-pin" href="recipes-page.php?cuisine=Chinese"><img class="map-pin" src="files/icons/yellow-pin.svg" alt="Yellow pin in China"></a>
                <span class="popup">Chinese</span>
            </span>
        </div>

<!-- -------------------------- ALL RECIPES BUTTON -------------------------- --> 

        <div class="center">
            <a href="recipes-page.php">
                <p class="button home-button">SEE RECIPES</p>
            </a>
        </div>

<!-- -------------------------- ABOUT SECTION -------------------------- --> 

        <div class="about">
            <img src="files/general-images/chef.jpg" alt="">
            <h1>ABOUT THE CHEF</h1>
            <h2>OLIVIA KNESTAUT</h2>
            <p>Chef Olivia is a world traveler and culinary adventurer who brings global flavors to your kitchen. With a passion for discovering authentic recipes, Olivia has spent years traveling from bustling city markets to remote villages, learning traditional cooking techniques from local chefs and home cooks alike. <br> <br> Each dish she shares on Culinary Compass tells a story of culture, history, and the love of food, offering readers the chance to experience the world one recipe at a time. From street food to gourmet delicacies, Olivia inspires her audience to explore diverse cuisines and savor every bite.</p>
        </div>
    </div>

    <?php include("footer.php") ?>
    
</body>

</html>