<?php
// use App\Kernel;

// require dirname(__DIR__).'/config/bootstrap.php';

// $kernel = new Kernel($_SERVER['APP_ENV'], (bool) $_SERVER['APP_DEBUG']);


//  $dotenv = new Dotenv();
//  $dotenv->load(__DIR__.'/../app/config/.env');

if (!isset($_SERVER['APP_ENV'])) {
    if (!class_exists(Dotenv::class)) {
        throw new \RuntimeException('APP_ENV environment variable is not defined. You need to define environment variables for configuration or add "symfony/dotenv" as a Composer dependency to load variables from a .env file.');
    }
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Temp 18° - Online magazine for teens</title>
    <?php include './components/header_tags.php'; ?>
    <?php include './components/post_functions.php'; ?>
    <meta name="description" content="Online magazine and platform for teenagers to learn about current news, lifestyle, entertainment, fashion, tech, sports, science from other teenagers" />
    <link rel="canonical" href="http://temp18.co/" />
    <meta name="keywords" content="Temp 18, Teen magazine, Magazine, Teens, For teens, Read, Teenagers, Lifestyle, Fashion, Tech, Sports, Test Prep">
    <meta name="robots" content="index, follow">
</head>

<body>
    <?php include './components/header.php'; ?>

    <section class="slideshow-section">
        <div class="row m-articles-section-row">
            <?php
            echo drawMainSlideshow();
            ?>

        </div>
    </section>
    <?php  
        for($i = 0; $i <countRows('categories'); $i++){
            echo drawRandomCategories($i+1); 
        }
     ?>

<section class="main-category-wrapper">
    <?php
    for($i = 1; $i <= countRows('categories'); $i++){
        echo drawCategorySectionMain($i);
    }
?>
</section>

    <?php include './components/footer.php';?>
</body>

</html>