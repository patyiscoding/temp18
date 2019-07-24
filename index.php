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
    <!--temporarily here-->

    <section class="slideshow-section">
        <div class="row m-articles-section-row">
            <?php
            echo drawMainSlideshow();
            ?>

        </div>
    </section>

<!--<section class="section-padding section-inside-padding main-typing-section">
<div class="m-box-blue">
                            <h2>
                                <span class="m-typed"></span>
                            </h2>
                        </div>
</section>-->



    <!--
    <section class="container-fluid m-random-section">
        <h2 class="m-box-back hide-on-mobile">TEMP 18&#176;</h2>
        <div class="row">
            <div class="col-xs-12 m-random-article-border">

                <div class="col-xs-12">
                    <div class="m-box-gray m-section-padding">

                        <div class="m-box-blue">
                            <h2>
                                <span class="m-typed"></span>
                            </h2>
                        </div>

                        <div class="m-box-yellow">
                            <div>
                                <p>Temp 18° is an online magazine and a social hub for teens.</p>
                                <p>Our mission is to relieve the ubiquitous teenage stress by encouraging and promoting learning in an eccentric style. We believe that in order to understand and develop a passion for something, there must be a sense of unity and will. </p>
                                <p>We hope you find our articles humorous, relatable, and knowledgeable!</p>
                            </div>
                        </div>

                    </div>


                </div>
-->




    <!--                <div class="m-random-article col-xs-12 col-md-6">-->



    <!--
                    <div class="m-random-article-inside">
                        <div class="m-random-article-wrapper">
                            <div class="m-random-mask-container -is-animated" js-split-lines-fade-in="" style="">
                                <div class="m-random-mask-box" style="display: block; text-align: start; position: relative; transform: matrix(1, 0, 0, 1, 0, 0);">
                                    <div class="wrapper-black-mask" style="transform: translate3d(0px, 0px, 0px);">
                                        <div class="black-mask">
                                            <div class="black-mask-shape" id="m-mask-text-first"></div>
                                            <div class="wrapper-text">
                                                <span id="wrapper-text-span" style="transform: translate3d(0px, 0px, 0px);">
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-random-mask-box" style="display: block; text-align: start; position: relative; transform: matrix(1, 0, 0, 1, 0, 0);">
                                    <div class="wrapper-black-mask" style="transform: translate3d(0px, 0px, 0px);">
                                        <div class="black-mask">
                                            <div class="black-mask-shape" id="m-mask-text-second"></div>
                                            <div class="wrapper-text">
                                                <span style="transform: translate3d(0px, 0px, 0px);">Read about</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
-->

    <!--                    <div class="m-random-categories">-->
    <?php  
//                        for($i = 0; $i <countRows('categories'); $i++){
//                            echo drawRandomCategories($i+1); 
//                        }
                    ?>
    <!--                    </div>-->
    <!--                </div>-->



    <!--
            </div>
        </div>
    </section>
-->



    <!--
MAIN FEATURED ARTICLE
    <section class="container-fluid m-featured m-section-inside-padding">
        <a href="">
            <div class="m-featured-wrapper">
                <div>
                    <div class="m-featured-image">
                                                    <div></div>
                        <img src="/temp18/pictures/m6.jpg">
                    </div>
                </div>
                <div class="row m-featured-row section-padding">
                    <div class="col-xs-12 section-inside-padding m-featured-row-inside">
                        <div>
                            <h2>Fields of five-story-high ice blades could complicate landing on Jupiter moon</h2>
                        </div>
                        <p>Scientists have long wanted to explore Jupiter’s frozen moon, Europa, which is home to a vast subsurface ocean that makes it a promising home for extraterrestrial life.</p>

                    </div>
                </div>
            </div>
        </a>
    </section>
-->
            <?php
//                $limit = 6;
//                $colevery = $limit / 2;
//                $count = 1;
//            $result = "a";
  //              for($i = 0; $i <countRows('articles'); $i++){
//                    if($result != '' && $count == 1){
//                        echo '<div class="col-xs-12 col-md-6">';
//                    }
 //                   $result = drawPost($i+1);
   //                 echo $result;
//                    if($count == $colevery){
//                        echo '</div>';
//                        $count = 0;
//                    }
//                    if($result != ''){
//                         $count++;
//                    } 
                    
   //             }
  ?>

    <!--
    <section class="container-fluid m-section-inside-padding m-section-category-wrapper">
        <div class="row m-articles-section-row m-section-padding m-section-category">
-->
<section class="main-category-wrapper">
    <?php
    for($i = 1; $i <= countRows('categories'); $i++){
        echo drawCategorySectionMain($i);
    }
?>
</section>


        <!--
            <div class="col-xs-12 col-md-7 m-column-first">
                <div class="col-xs-12 col-md-6 box-featured m-column-header">
                    <div>
                        <h2 class="m-column-header-text">Science</h2>
                    </div>
                    <p class="m-column-header-p">From prior experience, I know reading SAT passages can be very daunting, but believe me, it does not have to be. For the reading section</p>
                    <a class="button" href="">See all</a>


                </div>
                <div class="col-xs-12 col-md-6 box-featured">
                    <a class="m-box" href="/temp18/article/sat-how-to-reading" name="1">
                        <div class="col-xs-12 feat-wrapper">
                            <div class="feat-background-image">
                                <img src="/temp18/pictures/fe.jpg"></div>

                            <div class="col-xs-12 feat-text">
                                <div>
                                    <h2>How to Read SAT Reading Passages</h2>
                                </div>
                                <p>Martin gives an inside look on the SAT Reading section</p>
                                <p id="m-descr-p"></p>
                                <div class="m-article-content">
                                    <p>From prior experience, I know reading SAT passages can be very daunting, but believe me, it does not have to be. For the reading section, the most important thing that you need to have is a clear stra...</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
-->

        <!--
                <div class="col-xs-12 col-md-5 m-column-second">

                    <section class="c-last_news col-xs-12" data-widget="latestNews">

                        <h1 class="c-last-news_title o-title overline">
                            <a data-route="articles" href="http://kekselias.com/articles/" class="js-wow u-fadeInLeftBig" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeftBig;">Latest Articles</a>
                        </h1>

                        <article class="c-last-news_item overline is-active" style="z-index: 35;">
                            <div class="c-last-news_content js-wow is-animated" style="opacity: 0.521758; transform: translate(71.7363%, 0%) translate3d(0px, 0px, 0px); visibility: visible;">
                                <div class="o-container_content  js-wow is-animated" style="visibility: visible;">
                                    <p class="c-last-news_infos">
                                        01 07 2018 |&nbsp;by Victor Xing | Capital Markets </p>
                                    <p class="c-last-news_intro o-subtitle">
                                        <a href="http://kekselias.com/articles/2018/01/07/flatter-yield-curve-symptom-ineffective-tightening/">Flatter yield curve a symptom of ineffective tightening</a>
                                    </p>
                                    <a href="http://kekselias.com/articles/2018/01/07/flatter-yield-curve-symptom-ineffective-tightening/" class="c-last-news_more o-link">
                            Read the post                            <span class="overlay">
                                Read the post                            </span>
                        </a>
                                </div>
                            </div>
                        </article>

 <article class="c-last-news_item overline" style="z-index: 30;">
                            <div class="c-last-news_content js-wow is-animated" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0); visibility: visible;">
                                <div class="o-container_content ">
                                    <p class="c-last-news_infos">
                                        12 04 2017 |&nbsp;by Victor Xing | Central Banks </p>
                                    <p class="c-last-news_intro o-subtitle">
                                        <a href="http://kekselias.com/articles/2017/12/04/bond-market-term-premium-wolves-yellowstone/">Bond market term premium and wolves of Yellowstone</a>
                                    </p>
                                    <a href="http://kekselias.com/articles/2017/12/04/bond-market-term-premium-wolves-yellowstone/" class="c-last-news_more o-link">Read the post                            
                                <span class="overlay">Read the post</span>
                                </a>
                                </div>
                            </div>
                        </article>




                    </section>
                </div>

        </div>
        </section>
-->

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
