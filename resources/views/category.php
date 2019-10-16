<html>

<head>
    <?php include '../header_tags.php'; 
   
    require("../../config.php");
    $connect = new mysqli($addressdb, $logindb, $passworddb, $namedb);
    $connect->set_charset('utf8mb4');
    if (!mysqli_connect_errno()){
    	$category = $_GET['category'];
        $result = $connect->query("SELECT title_descr FROM categories WHERE category_name = '$category'") or die($connect->error);
        $categoryArray = mysqli_fetch_array($result);
        $title_descr = $categoryArray['title_descr'];
        }
         echo '<title>'.$category." | ".$title_descr.'</title>';
?>

</head>

<body>
    <?php 
    include '../components/header.php'; 
    ?>

    <?php 
                  if(isset($_GET['category'])){
                    echo drawCategoryPage($_GET['category']); 
                  }
    ?>
    <section class="container-fluid section-padding">
        <?php
                for($i = countRows('articles'); $i > 0; $i -= 1){
                    echo drawPostCategory($i, $_GET['category']);
                }
  
                ?>

    </section>
    <?php include '../components/footer.php'; ?>
</body>

</html>
