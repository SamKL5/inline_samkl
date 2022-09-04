<?php
$mysql = mysqli_connect('localhost','root','root','Inline');
$mysql->set_charset("utf8");
if($mysql->connect_error){
    die("Ошибка подключения");
}else{

    $query=trim($_POST['query']);

    if(strlen($query) >= 3){
        $result=$mysql->query("SELECT `comments`.`body`, `comments`.`postId`,`posts`.`title` FROM `comments` 
        JOIN `posts` 
        ON(`comments`.`postId`=`posts`.`id`) 
        WHERE `comments`.`body` LIKE '%$query%' 
        ORDER BY `posts`.`id` ");

        $postId = null;
        echo "<div>Результат поиска:";
        if($result->num_rows){
            while($res=$result->fetch_assoc()):

                if($postId != $res['postId'] || $postId == null){
                    echo "</div>";
                    $postId = $res['postId'];
                    echo "<div  style='border: 1px solid black;margin-top: 5px;' id='".$postId."'><h3>".$res['title']."</h3>";
                }
                echo 
                "<hr><p>".$res['body']."</p>";
            endwhile;
        }else{
            echo "</div>Ничего не найдено";
        }
    }
        

}
?>