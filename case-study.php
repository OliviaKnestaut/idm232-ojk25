<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Case Study</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/navigation.css">
    <link rel="icon" href="files/general-images/grey-logo.svg">
</head>
<body>

<!-- -------------------------- Case Study -------------------------- --> 

    <div class="body">
    <?php include("header.php") ?>
        <h1>CULINARY COMPASS</h1>
        <h3>A responsive Recipe Website using HTML, CSS, PHP, and MySQL</h3>

        <img class="cover-img " src="files/case-study/hero-img.png" alt="">

        <div class="center">
                <a href="index.php">
                    <p class="button home-button">LIVE PROJECT</p>
                </a>
                <a href="https://github.com/OliviaKnestaut/idm232-ojk25" target="_blank">
                    <p class="button home-button">GITHUB</p>
                </a>
            </div>

        <div class="case-study-sect container">
            <h2 class="recipe-title">Overview</h2>
            <p>
                Designed as a responsive and user-friendly web application, this project integrates HTML, CSS, PHP, and MySQL to deliver a smooth browsing, searching, and filtering experience. This project includes a custom-built database to browse, search, and filter recipes. A fully responsive and functioning front end interacts with this database to pull recipes based on combinations of cuisine, diet, and custom search queries. This project successfully met all technical and functional requirements of the assignment, creating a platform that delights users and demonstrates technical expertise.
            </p>
        </div>

        <div class="case-study-sect container">
            <h2 class="recipe-title">Context and Challenge</h2>
            <h3 class="recipe-subtitle"><b>Background</b></h3>
            <p>
                This project was created for the class IDM 232, Web Scripting II, under the direction of Professor Phil Sinatra. This was an intensive, 10-week in-person course to learn the fundamentals of server-side scripting. Working individually, but with class and instructor support, we were tasked to designing and developing a custom online cookbook from a library of pre-written recipes and images.
            </p>
            <h3 class="recipe-subtitle"><b>Goals and Objectives</b></h3>
            <ul>
                <li>
                    <b>Technical Goals</b>
                    <ul>
                        <li>Build the application using PHP and MySQL for backend operations</li>
                        <li>Implement a responsive design compatible with devices from smartphones to desktops</li>
                        <li>Store and retrieve recipe data dynamically from a MySQL database</li>
                        <li>Allow complex fitering across a combination of 3 queries</li>
                    </ul>
                </li>
                <li>
                    <b>User Goals</b>
                    <ul>
                        <li>Allow users to easily browse, search, and filter recipes</li>
                        <li>Deliver an intuitive and visually engaging user interface</li>
                        <li>Develop consistent branding across all site pages and subpages</li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="case-study-sect container">
            <h2 class="recipe-title">Process and Insight</h2>
            <h3 class="recipe-subtitle"><b>Design</b></h3>
            <p>
                To begin the design process I created detailed wireframes in Figma to represent my cookbook concept. These designs focused on creating a clean layout for browsing and filtering recipes. These designs broke down the key elements that would be included on each page and helped me understand which elements could be placed with php includes, like the header, footer, and recipe cards. As the early designs took shape I chose to focus my cook book on international meals and have my key filter on the site be cuisine.
            </p>
            <img class="cover-img " src="files/case-study/wireframe-1.png" alt="">
            <img class="cover-img " src="files/case-study/wireframe-2.png" alt="">
            <p>
            With the wireframes created I them developed my design inventory to explore the site color scheme, fonts and branding. I used this inventory to catalog the color schemes, typography, and reusable components, like icons, for use across the site. Having a consistent branding plan and all my assets in one place helped streamline the front-end development process.
            </p>
            <picture>
            <source
            media="(min-width: 768px)"
            srcset="files/general-images/Style_Tile-pc.png" />

            <img class="style-tile style-tile-2"
            src="files/general-images/Style_Tile-mobile.png"
            alt="" />
            </picture>

            <h3 class="recipe-subtitle"><b>Development</b></h3>
            <p>To begin the development process I first coded all my planned pages in HTML and CSS. I used one recipe as a template to help plan the structure and ensure my media queries for responsive designs worked as intended. This site was submitted as my Alpha assignment around the halfway point of the quarter.
                <br><br>
                With all structure developed and designed the second half of the quarter was focused on creating my database, insertng the variables into my HTML templates, and creating my search and filter functionality. To do this I set up a local server and database on my personal device using MAMP. I used PHP to fetch data from the MySQL database.
            </p>
            <img class="cover-img " src="files/case-study/table-img.png" alt="">
            <p>
            Working with PHP I explored using for each loops to cycle through database records, breaking up database records at delimiters, and creating url queries to filter and search. The most challenging part of the PHP development was the search and filter functionality. With my website's focus it was important to me that cuisine be a filter, but I also thought it would be beneficial to filter by diet and custom search queries. After developing all of these functions separately, I realised that using only one filter at a time could be frustrating and restricting. This lead to many hours spent determining how to best combine the queries so that users can filter by all, some, or even none of the available options.

            </p>
            <picture>
                    <source
                    media="(min-width: 768px)"
                    srcset="files/general-images/Search_bar.png">

                    <img id="search-bar-img"
                    src="files/general-images/Search_bar_small.png"
                    alt="">
                </picture>
        </div>

        <div class="case-study-sect container">
            <h2 class="recipe-title">The Solution</h2>
            <p>
            The final completed site allows dynamic recipe browsing, displaying recipes with their accompanying images and information from the database. User can search by keywords, and filter by cuisine and diet. The application as a whole adapts to screens of all sizes for usability on mobile and desktop devices. Finally, the site has consistent visual branding with earthy tones and vibrant imagery.

            </p>
            <img class="cover-img " src="files/case-study/hero-img.png" alt="">

        </div>

        <div class="case-study-sect container">
            <h2 class="recipe-title">The Results</h2>
            <p>
            The Culinary compass successfully met all technical and user goals outlined. It has fully operational PHP and MySQL integration, responsive design, complex filtering, an engaging interface, and consistent branding. Over the course of this project, I learned the fundamentals of PHP and MySQL for server-side scripting. I was able to balance back end functionality with front end aesthetics to create my fully functional final project.
            </p>
            <div class="center">
                <a href="index.php">
                    <p class="button home-button">LIVE PROJECT</p>
                </a>
                <a href="https://github.com/OliviaKnestaut/idm232-ojk25" target="_blank">
                    <p class="button home-button">GITHUB</p>
                </a>
            </div>
        </div>

    </div>

    <?php include("footer.php") ?>

</body>
</html>