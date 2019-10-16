<?php
function drawMainSlideshow(){
    $connect = new PDO($_ENV['DV_HOST'], $_ENV['DB_DATABASE'], $_ENV['DB_USERNAME'],$_ENV['DB_PASSWORD']);
    if (!mysqli_connect_errno()){
        $limit = 7;
         $result = $connect->query("SELECT * FROM articles WHERE id IN (SELECT article_id FROM slideshow) LIMIT $limit");
         $result2 = "";
         $result2 .= '<div id="slideshow" class="carousel slide" data-ride="carousel"><div class="carousel-inner">';
        
        $result2 .= '<ol class="carousel-indicators">';
        $result2 .= '<li data-target="#slideshow" data-slide-to="0" class="active slideshow-li"></li>';
           for($k = 1; $k < $limit; $k++){
               $result2 .= '<li data-target="#slideshow" data-slide-to="'.$k.'" class="slideshow-li"></li>';
           }
    
        $result2 .= '</ol>';
        
        $temp = 0; 
        while ($row = $result->fetch_assoc()){
                $article_id = $row["id"];
                $url = $row["url"];
                $date = str_replace('-', '/', $row["date"]);
                $date = date("F j, Y", strtotime($date));
                $title = $row["title"];
                $content = $row["content"];
                $color = $row["color"];
                if($color == "") $color = "#fff";
                $category = $row["category"];
                $author = $row["author"];
                $authorArray = explode(", ", $author);
                // $slideshow = $row["slideshow"];
                $picturepath = $row["picture_path"];
                $authorString = "";
            
                $count = 1;
                foreach($authorArray as $value){
                $authorsArray = $connect->query("SELECT * FROM authors WHERE id = '$value'") or die($connect->error);
                $matchAuthor = mysqli_fetch_array($authorsArray);
                $author = $matchAuthor['author_name'];
               if($count < count($authorArray)){
                    $authorString .= $author.", ";
                }else{
                    $authorString .= $author;
                }
                $count++;
            }

                if($temp == 0){
                    $result2 .= '<div class="item active">';
                }else{
                    $result2 .= '<div class="item">';
                }

                $result2 .= '<img class="slideshow-img" src="'.$picturepath.'" alt="Chicago">';
                $result2 .= '<div class="slideshow-overlay">';
                $result2 .= '<div class="slideshow-text">';
                $result2 .= '<div class="slideshow-text-content">';
                $result2 .= '<div class="slideshow-text-content-inside" id="id-'.$url.'"><style>#id-'.$url.' * {color: '.$color.';} #id-'.$url.' .button{border: 2px solid'.$color.'; color: '.$color.'}</style><h1 class="slideshow-title">'.$title.'</h1>';
                $result2 .= '<p class="slideshow-date">'.$date." | ".$authorString."</p>";
                $result2 .= "<p><a class='button' href='http://temp18.co/article/$url/'>Read</a></p>";

                $result2 .= '</div></div></div></div>';
                
                $result2 .= "</div>";
                $temp++;
         }
        $result2 .= "</div></div>";
        return $result2;
    }
}


function drawPost($id){
        
        $connect = new PDO($_ENV['DB_HOST'], $_ENV['DB_DATABASE'], $_ENV['DB_USERNAME'],$_ENV['DB_PASSWORD']);
    if (!mysqli_connect_errno()){
        $limit = 6;
        $result = $connect->query("SELECT * FROM articles ORDER BY date DESC LIMIT $limit");
         while ($row = $result->fetch_assoc()){
             if ($row["id"] == $id){
                $article_id = $row["id"];
                $url = $row["url"];
                $date = str_replace('-', '/', $row["date"]);
                $date = date("F j, Y", strtotime($date));
                $title = $row["title"];
                $content = $row["content"];
                $color = $row["color"];
                $category = $row["category"];
                $author = $row["author"];
                $picturepath = $row["picture_path"];
                 $result2 = "";
                 switch($size){
                     case 1:
                         $result2 .= '<div class="col-xs-12 col-md-4 box">';
                         break;
                 }
                 $result2 .= "<a class='m-box' href='/temp18/article/$url/' name='$article_id'>";
                 $result2 .= "<div class='col-xs-12 m-image-wrapper'>";
                 $result2 .= "<div class='background-image'>";
                 $result2 .= "<div></div>";
                 $result2 .= '<img src="';
                 $result2 .= $picturepath;
                 $result2 .= '"></div></div>';
                 $result2 .= "<div class='col-xs-12 m-content-wrapper'>";
                 $result2 .= "<div><h2>".$title."</h2></div>";
                 $result2 .= '<p class="m-descr-p"></p>';
                 $result2 .= '<div class="m-article-content"><p>';
                 $result2 .= rtrim(substr($content, 0, 200));
                 $result2 .= '...</p></div></div></a></div>';

                return $result2;
             }
         }
    }else{
        echo mysqli_connect_error();
    }
}

function drawPostCategory($id, $categoryName){
        
        $connect = new PDO($_ENV['DB_HOST'], $_ENV['DB_DATABASE'], $_ENV['DB_USERNAME'],$_ENV['DB_PASSWORD']);
        $connect->set_charset('utf8mb4');
    if (!mysqli_connect_errno()){
        $result3 = $connect->query("SELECT id FROM categories WHERE category_name = '$categoryName'");
        $fetchresult = mysqli_fetch_array($result3);
        $fetch = $fetchresult['id'];
        $result = $connect->query("SELECT * FROM articles WHERE category = $fetch ORDER BY date");
         while ($row = $result->fetch_assoc()){
             if ($row["id"] == $id){
                $article_id = $row["id"];
                $url = $row["url"];
                $date = str_replace('-', '/', $row["date"]);
                $date = date("F j, Y", strtotime($date));
                $title = $row["title"];
                $content = $row["content"];
                $color = $row["color"];
                $category = $row["category"];
                $author = $row["author"];
                $result4 = $connect->query("SELECT author_name FROM authors WHERE id = '$author'");
                $fetchresult2 = mysqli_fetch_array($result4);
                $author = $fetchresult2['author_name'];
                $picturepath = $row["picture_path"];
                 $result2 = "";
                 $result2 .= '<div class="col-xs-12 col-md-4 box">';
                 $result2 .= "<a class='m-box' href='/article/$url/' name='$article_id'>";
                 $result2 .= "<div class='col-xs-12 m-image-wrapper'>";
                 $result2 .= "<div class='background-image'>";
                 $result2 .= "<div></div>";
                 $result2 .= '<img src="http://temp18.co/';
                 $result2 .= $picturepath;
                 $result2 .= '"></div></div>';
                 $result2 .= "<div class='col-xs-12 m-content-wrapper'>";
                 $result2 .= "<div><p>".$date." | ".$author."</p>";
                 $result2 .= "<h2>".$title."</h2></div>";
                 $result2 .= '<div class="m-article-content"><p>';
                 $result2 .= rtrim(substr($content, 0, 200));
                 $result2 .= '...</p></div></div></a></div>';
                return $result2;
             }
         }
    }else{
        echo mysqli_connect_error();
    }
}

function countRows($table){
        
        $i = 0;

        $connect = new PDO($_ENV['DB_HOST'], $_ENV['DB_DATABASE'], $_ENV['DB_USERNAME'],$_ENV['DB_PASSWORD']);
     if (!mysqli_connect_errno()){
        $result = $connect->query("SELECT id FROM $table");
        while ($row = $result->fetch_assoc()){
            $i = $row["id"];
        }
        return $i;
    }else{
        echo mysqli_connect_error();
    }
 }


function drawCategorySectionMain($id){
    
    $connect = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE']);
    $connect->set_charset('utf8mb4');
     if (!mysqli_connect_errno()){
        $result = $connect->query("SELECT * FROM categories");
        $result2 = "";
         while ($row = $result->fetch_assoc()){
             if ($row["id"] == $id){
                 $category_name = $row["category_name"];
                 $description = $row["description"];
                 $featured_id = $row["featured"];
                 $primary_color = $row["primary_color"];
                 $secondary_color = $row["secondary_color"];
                 
                 $resultFeat = $connect->query("SELECT * FROM articles WHERE id = '$featured_id' AND category = '$id'");
                 $row2 = mysqli_fetch_array($resultFeat);
                 $idFeat = $row2['id'];
                 $urlFeat = $row2['url'];
                 $titleFeat = $row2['title'];
                //  $descriptionFeat = $row2['description'];
                 $pictureFeat = $row2['picture_path'];
                 $categoryArray = "";
                 
                 for($i = 0; $i <= 20; $i++){
                     $categoryArray .= $category_name." ";
                 }
                 
                 $result2 .= "<section class='container-fluid m-section-inside-padding m-section-category-wrapper m-hide' style='opacity: 0'
                 id='m-section-category-box-$id'>";
                 $result2 .= "<div class='row m-articles-section-row m-section-padding m-section-category'>";
                 $result2 .= "<div class='col-xs-12 col-md-7 m-column-first' id='m-column-first-$id'>";
                 $result2 .= "<style>@media screen and (min-width: 1024px) {#m-column-first-$id::before{content:'$categoryArray'}}</style>";
                 $result2 .= '<div class="col-xs-12 col-md-6 box-featured m-column-header">';
                 $result2 .= '<div>';
                 $result2 .= "<h2 class='m-column-header-text'>".$category_name.'</h2>';
                 $result2 .= '</div>';
                 $result2 .= '<p class="m-column-header-p">'.$description.'</p>';
                 $result2 .= "<a class='button' href='http://temp18.co/category/$category_name/'>See all</a>";
                 $result2 .= "</div>";
                 $result2 .= '<div class="col-xs-12 col-md-6 box-featured m-column-image">';
                 $result2 .= "<a class='m-box' href='http://temp18.co/article/$urlFeat/' name='$idFeat'>";
                 $result2 .= '<div class="col-xs-12 feat-wrapper">';
                 $result2 .= '<div class="feat-background-image flex">';
                 $result2 .= "<img src='$pictureFeat'></div>";
                 $result2 .= '<div class="col-xs-12 feat-text">';
                 $result2 .= '<div>';
                 $result2 .= "<h2>$titleFeat</h2>";
                 $result2 .= '</div>';
                //  $result2 .= "<p>$descriptionFeat</p>";
                 $result2 .= '<p class="m-descr-p"></p>';
                 $result2 .= '</div></div></a></div></div>';
                 
                 $result2 .= '<div class="col-xs-12 col-md-5 m-column-second">';
                 $result2 .= '<section class="c-last_news col-xs-12" data-widget="latestNews">';
                 $result2 .= "<style>#c-last-news_title-$id a {color: $secondary_color} #c-last-news_title-$id a:before {background-color: $secondary_color}</style>";
                 $result2 .= "<h1 class='c-last-news_title o-title overline' id='c-last-news_title-$id'>";
                 $result2 .= '<a data-route="articles" class="js-wow u-fadeInLeftBig" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeftBig;">Latest Articles</a>';
                 $result2 .= '</h1>';
                 
                 $resultSlide = $connect->query("SELECT * FROM articles WHERE id <> '$featured_id' AND category = $id ORDER BY date DESC LIMIT 5");
                 
                 $result2 .= '<div id="myCarousel" class="carousel slide col-xs-12" data-ride="carousel"><div class="carousel-inner">';
                 
                 $temp = 0;
                 while ($row3 = $resultSlide->fetch_assoc()){
                     $s_article_id = $row3["id"];
                     $s_url = $row3["url"];
                     $s_date = str_replace('-', '/', $row3["date"]);
                     $s_date = date('F d, Y', strtotime($s_date));
                     $s_title = $row3["title"];
                     $s_author = $row3["author"];
                     $authorsArray = $connect->query("SELECT * FROM authors WHERE id = '$s_author'") or die($connect->error);
                     $matchAuthor = mysqli_fetch_array($authorsArray);
                     $s_author = $matchAuthor['author_name'];
                     
                     if($temp == 0){
                         $result2 .= '<div class="item active item-border">';
                     }else{
                         $result2 .= '<div class="item item-border">';
                     }

                     $result2 .= '<p>'.$s_date." | ".$s_author."</p>";
                     $result2 .= "<a href='http://temp18.co/article/$s_url/'><h2>".$s_title."</h2></a>";
                     $result2 .= "<a href='http://temp18.co/article/$s_url/'><p style='color: $secondary_color'>READ THE POST</p></a></div>";
                     
                     $temp++;
                 }
                 $result2 .= '</div></div></section></div></div></section>';
                return $result2;
             }
         }
    }else{
        echo mysqli_connect_error();
    }
}

function drawArticle($articleURL){
    
    $connect = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE']);
    $connect->set_charset('utf8mb4'); 
    $result2 = "";
    if (!mysqli_connect_errno()){
        $result = $connect->query("SELECT * FROM articles WHERE url = '$articleURL'") or die($connect->error);
        while ($row = $result->fetch_assoc()){
            $url = $row["url"];
            $date = $row["date"];  
            $date = date("F d, Y", strtotime($date));
            $title = $row["title"];
            $content = $row["content"];
            $category = $row["category"];
            $author = $row["author"];
            $authorArray = explode(", ", $author);
            $picturepath = $row["picture_path"];
            
            $result2 .= '<div class="container-fluid a-container"><div class="container-fluid a-img-container">';
            $result2 .= '<div class="a-img">';
            $result2 .= "<img src='http://temp18.co/$picturepath'>";
            $result2 .= '</div></div>';
            
            $result2 .= '<div class="container-fluid a-main section-padding section-inside-padding">';
            $result2 .= '<div class="row"><div class="col-xs-12">';
            
            $result2 .= '<section class="a-article-header-container">';
            $result2 .= '<div class="section-padding a-title-container">';
            $result2 .= '<div><div class="a-title"><h2>'.$title.'</h2></div>';
            $result2 .= '<div class="a-descr">';
            $result2 .= '<div><span>By</span><span class="a-descr-name">';
            $count = 1;
            foreach($authorArray as $value){
                $authorsArray = $connect->query("SELECT * FROM authors WHERE id = '$value'") or die($connect->error);
                $matchAuthor = mysqli_fetch_array($authorsArray);
                $author = $matchAuthor['author_name'];
                $author_role = $matchAuthor['author_role'];
                $author_short_descr = $matchAuthor['author_short_descr'];
                $author_url = $matchAuthor['picture_path'];
                if($count < count($authorArray)){
                    $result2 .= $author.", ";
                }else{
                    $result2 .= $author;
                }
                $count++;
            }
            $result2 .= '</span></div><p>';
            $result2 .= $date;
            $result2 .= '</p></div></div></div></section>';
            
            $result2 .= '<section class="semi-article-padding">';
            $result2 .= '<article><div>';
            $result2 .= '<div class="a-content">';
            $result2 .= $content;
            $result2 .= '</div></div></article></section>';
                     
            $result2 .= '<section class="a-contact">';
            $result2 .= '<span>Have any concerns or questions about what you just read? Let us know by leaving us a message!</span>';
            $result2 .= '</section>';
            
            foreach($authorArray as $value){
                $authorsArray = $connect->query("SELECT * FROM authors WHERE id = '$value'") or die($connect->error);
                $matchAuthor = mysqli_fetch_array($authorsArray);
                $author = $matchAuthor['author_name'];
                $author_role = $matchAuthor['author_role'];
                $author_short_descr = $matchAuthor['author_short_descr'];
                $author_url = $matchAuthor['picture_path'];
           
                $result2 .= '<section class="article-footer">';
                $result2 .= '<div>';
                $result2 .= '<div class="row a-article-footer-border">';
                $result2 .= '<div class="col-xs-5">';
                $result2 .= '<div class="article-footer-img">';
                $result2 .= '<div class="image-cropper">';
                $result2 .= "<img src=$author_url>";
                $result2 .= '</div></div>';
                $result2 .= '<h2>'.$author.'</h2>';
                $result2 .= '<h2>'.$author_role.'</h2>';
                $result2 .= '</div>';
                $result2 .= '<div class="col-xs-7">';
                $result2 .= '<div class="article-footer-descr">';
                $result2 .= '<p>'.$author_short_descr.'</p>';
                $result2 .= '</div></div></div></div></section>';     
            }
            $result2 .= '</div></div></div></div>';  
        }
        return $result2;
    }
}

function drawCategoryPage($category){
    
    $connect = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE']);
    $connect->set_charset('utf8mb4'); 
    $result2 = "";
    if (!mysqli_connect_errno()){
//        $result = $connect->query("SELECT * FROM articles WHERE category_name = '$category' ORDER BY date DESC LIMIT 2O") or die($connect->error);
        $result3 = $connect->query("SELECT * FROM categories WHERE category_name = '$category'") or die($connect->error);
        $categoryArray = mysqli_fetch_array($result3);
        $category_descr = $categoryArray['description'];
        $category_primaryC = $categoryArray['primary_color'];
        $category_secondaryC = $categoryArray['secondary_color'];
        $result2 .= "<section class='container-fluid c-header-section' style='background-color: $category_primaryC'>";
        $result2 .= '<div>';
        $result2 .= "<h2>".$category."</h2></div></section>";
        return $result2;
    }
}

function drawDescriptions($division){
    
    $connect = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE']);
    $connect->set_charset('utf8mb4');   
    $rowNum = countRows('authors');
    $k = 1;
    $switch = 0;
    $result2 = "";
    if (!mysqli_connect_errno()){
        $result = $connect->query("SELECT * FROM authors") or die($connect->error);
        $countDivisionRowsResult = $connect->query("SELECT COUNT(id) FROM authors WHERE author_division = '$division'") or die($connect->error);
//        $numResults = mysqli_num_rows($countDivisionRowsResult);
        while ($row = $countDivisionRowsResult->fetch_assoc()) {
            $countDivisionRows = $row['COUNT(id)'];
        }
        
         while ($row = $result->fetch_assoc()){
             if ($row["author_division"] == $division){
                 $author_name = $row["author_name"];
                 $author_role = $row["author_role"];
                 $author_descr = $row["author_descr"];
                 $picture_path = $row["picture_path"];
//                 if($countDivisionRows % 3 == 2 && ($k == $countDivisionRows || $k == $countDivisionRows - 1)){
//                     $result2 .= '<div class="col-xs-12 col-md-6 au-author-container">';
//                 }else{}
                 if($switch == 0){
                    $result2 .= '<div class="col-xs-12 col-md-6 au-author-container clearfix">';
                 }else{
                     $result2 .= '<div class="col-xs-12 col-md-6 au-author-container">';
                 }
                 $switch++;
                 if($switch == 2){
                     $switch = 0;
                 }
                 $result2 .= '<div class="addflex"><div class="col-xs-12 col-md-6">';
                 $result2 .= '<div class="center-block au-photo image-cropper-descr">';
                 $result2 .= "<img src='$picture_path'></div>";
                 $result2 .= '<div><h2 class="au-name">';
                 $result2 .= $author_name;
                 $result2 .= '</h2><h2 class="au-role">';
                 $result2 .= $author_role;
                 $result2 .= '</h2></div></div>';
                 $result2 .= '<div class="col-xs-12 col-md-6">';
                 $result2 .= '<p class="au-descr au-descr-line">';
                 $result2 .= $author_descr;
                 $result2 .= '</p>';
                 $result2 .= '</div></div></div>';
                 $k++;
                 
             }
         }
        return $result2;
    }
}

function drawCategories($id){
    
    $connect = new PDO($_ENV['DB_HOST'], $_ENV['DB_DATABASE'], $_ENV['DB_USERNAME'],$_ENV['DB_PASSWORD']);
    if (!mysqli_connect_errno()){
        $result = $connect->query("SELECT * FROM categories");
        $result2 = '';
         while ($row = $result->fetch_assoc()){
             if ($row["id"] == $id){
                 $category_name = $row["category_name"];
                 $category_name_wout_space = str_replace(' ','%20', $category_name);
                 $result2 .= "<a class='f-category' href='http://temp18.co/category/$category_name_wout_space/'><p>";
                 $result2 .= $category_name;
                 $result2 .= '</p></a>';
                return $result2;
             }
         }
    }else{
        echo mysqli_connect_error();
    }
}

function drawHeaderCategories($id){
    
    $connect = new PDO($_ENV['DB_HOST'], $_ENV['DB_DATABASE'], $_ENV['DB_USERNAME'],$_ENV['DB_PASSWORD']);
    if (!mysqli_connect_errno()){
        $result = $connect->query("SELECT * FROM categories");
        $result2 = '';
         while ($row = $result->fetch_assoc()){
             if ($row["id"] == $id){
                 $category_name = $row["category_name"];
                 $result2 .= '<a href=">';
                 $result2 .= $category_name;
                 $result2 .= '"</a>';
                return $result2;
             }
         }
    }else{
        echo mysqli_connect_error();
    }
}

function drawHeaderCategories2($id){
     
    $connect = new PDO($_ENV['DB_HOST'], $_ENV['DB_DATABASE'], $_ENV['DB_USERNAME'],$_ENV['DB_PASSWORD']);
    if (!mysqli_connect_errno()){
        $result = $connect->query("SELECT * FROM categories");
        $numResults = mysqli_num_rows($result);
        $result2 = '';
        
         while ($row = $result->fetch_assoc()){
             if ($row["id"] == $id){
                 $category_name = $row["category_name"];
                 $category_name_wout_space = str_replace(' ','%20', $category_name);
                 $result2 .= '<li class="sticky_link">';
                 $result2 .= "<a href='http://temp18.co/category/$category_name_wout_space/'><span>";
//                 style='-webkit-transition-delay: .$delay";
//                 $result2 .= "s; transition-delay: .$delay";
                 $result2 .= "$category_name</span></a>";
                 $result2 .= "</li>";
                if((intval($numResults / 2) + 1) == $id){
                   $result2 .= '<li class="sticky_link oh hide-on-mobile">';
                    $result2 .= '<a href="http://temp18.co/" class="caps oh a-logo">';
                    $result2 .= '<span>TEMP 18&#176;</span>';
                    $result2 .= '</a></li>';
                }       

                 return $result2;
             }
         }
    }else{
        echo mysqli_connect_error();
    } 
}

function drawRandomCategories($id){
    
    $connect = new PDO($_ENV['DB_HOST'], $_ENV['DB_DATABASE'], $_ENV['DB_USERNAME'],$_ENV['DB_PASSWORD']);
    if (!mysqli_connect_errno()){
        $result = $connect->query("SELECT * FROM categories");
        $result2 = '';
         while ($row = $result->fetch_assoc()){
             if ($row["id"] == $id){
                 $category_name = $row["category_name"];
                 $result2 .= '<div class="m-random-category col-xs-5 col-md-3">';
                 $result2 .= '<a href="">';
                 $result2 .= $category_name;
                 $result2 .= '</a>';
                 $result2 .= '</div>';
                return $result2;
             }
         }
    }else{
        echo mysqli_connect_error();
    }
}

//    $colorsArray = array("E5D7C6", "CCAF8E", "FFD6BA", "FFE66D", "4ECDC4", "F7FFF7", "FF6B6B", "1A535C");      
//         style='background-color: $colorsArray[$id]     
?>
