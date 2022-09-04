<?php
$mysql = mysqli_connect('localhost','root','root','Inline');
$mysql->set_charset("utf8");

if($mysql->connect_error){
    die("Ошибка подключения");
}else{
    $json_comments = file_get_contents("https://jsonplaceholder.typicode.com/comments");
    $arr_comments = json_decode($json_comments);
    
    $json_posts = file_get_contents("https://jsonplaceholder.typicode.com/posts");
    $arr_posts = json_decode($json_posts);
    
    foreach($arr_posts as $post){
        $mysql->query("INSERT INTO `posts` (`userId`, `id`, `title`, `body`) 
        VALUES ($post->userId,$post->id,'$post->title','$post->body')");
    }
    foreach($arr_comments as $comment){
        $mysql->query("INSERT INTO `comments` (`postId`, `id`, `name`, `email`,`body`) 
        VALUES ($comment->postId,$comment->id,'$comment->name','$comment->email','$comment->body')");
    }
    
    echo "Загружено ".count($arr_posts)." записей и ".count($arr_comments)." комментариев";
}

// echo "<pre>";
// print_r($post->title);
// echo "</pre>";
?>