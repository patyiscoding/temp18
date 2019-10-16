<!DOCTYPE HTML>
<html>

<head>
    <title>Temp 18° - Online magazine for teens</title>
    <?php include 'header_tags.php'; ?>
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
//                        for($i = 0; $i <countRows('categories'); $i++){
//                            echo drawRandomCategories($i+1); 
//                        }
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
<script type="text/javascript">
    var typed = new Typed('.m-typed', {
        strings: ["", "For teens. By teens"],
        typeSpeed: 140
    });

</script>
<script type="text/javascript">
$("#slideshow").carousel({
  swipe: 80
});
</script>
