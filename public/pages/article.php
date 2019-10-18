<html>

<head>
    <?php include '../components/header_tags.php'; 
    require("../../config.php");
    $connect = new mysqli($addressdb, $logindb, $passworddb, $namedb);
    $connect->set_charset('utf8mb4');
    if (!mysqli_connect_errno()){
    	$url = $_GET['url'];
        $result = $connect->query("SELECT title FROM articles WHERE url = '$url'") or die($connect->error);
        $urlArray = mysqli_fetch_array($result);
        $title = $urlArray['title'];
        }
         echo '<title>'.$title.'</title>';
?>

</head>

<body>
    <?php 
    include '../components/header.php'; 
    ?>

    <?php 
                  if(isset($_GET['url'])){
                    echo drawArticle($_GET['url']); 
                  }
                ?>
    <?php include '../components/footer.php'; ?>
</body>

</html>
