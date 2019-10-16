<html>

<head>
    <?php include '../header_tags.php' ?>
    <title>About | Learn More About Us</title>
</head>

<body>
    <?php include '../components/header.php'; ?>

<section class="container-fluid au-content">
        <div class="row co-content-row">
            <div class="col-xs-12 col-md-8 section-padding au-left section-inside-padding">
                <div class="au-block section-padding">
<div>
                   
                    <h2 class="au-left-typing">
                        <span>Hello,</span>
                          <span>we are</span>
                        <div class="typing-p"><span class="typing"></span>
                        </div>
                        
                        <span>Meet our team!</span>
                    </h2>
             
                    
                </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-4 section-padding au-right section-inside-padding">
                <!--<img src="/pictures/logo.png" class="img-responsive center-block logo">-->
            </div>
            

        </div>
    </section>

    <section class="container-fluid au-backstory-container-fluid descriptions">
        <div class="au-backstory-container row">
            <div class="au-rotated"></div>
            <div class="au-backstory row">
                <div class="au-backstory-content">
                    <div class="col-xs-12 section-inside-padding">
                        <div class="au-title">
                            <h2>From authors</h2>
                        </div>
                        <p class="au-descr">
                            Imagine being able to enjoy learning. We know how stressful school and studying is, because at the end of the day, “studying” is a mixture of STUDY + DYING. While reading our articles, published by teenagers themselves, you will be exposed to topics that are intriguing and useful. We don't want learning to just occur in school. On our website, teenagers will be exposed to a variety of different, unique, interesting, and humorous articles, ranging from art to business. We want teenagers to look forward to reading a few articles a day, and at Temp 18°, learning will no longer be like reading Shakespeare (if you like Shakespeare, you don't belong here).
                        </p>
                    </div>
                </div>
            </div>
            <div class="au-white-rotated-container">
                <div class="au-rotated"></div>
            </div>
        </div>
        <?php
            require("../../config.php");
            $connect = new PDO($_ENV['DV_HOST'], $_ENV['DB_DATABASE'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
            $connect->set_charset('utf8mb4');   
            if (!mysqli_connect_errno()){
                $result3 = $connect->query("SELECT DISTINCT(author_division) FROM authors");
                while ($row = $result3->fetch_assoc()){
                    if($row["author_division"] != "Alumni") {
                        echo '<div class="au-author row section-padding '.$row["author_division"].'">';
                        echo '<div class="col-xs-12 section-inside-padding">';
                        echo '<div class="au-title"><h2>'.$row["author_division"].'</h2></div>';
                    
//                         if($row["author_subdivision"] != 'None'){
//                             echo '<div class="au-title"><h2>'.$row["author_subdivision"].'</h2></div>';
//                         }
                            echo drawDescriptions($row["author_division"]);
                         echo '</div>';
                         echo '</div>';
                    }
                }
            }
                ?>
    </section>
    <?php include '../components/footer.php';?>
</body>

</html>
<script type="text/javascript">
    var typed = new Typed('.typing', {
        strings: ["writers.", "designers.", "developers.", "18."],
        typeSpeed: 140,
        backSpeed: 50,
        backDelay: 1300,
        loop: true,
    });
</script>
