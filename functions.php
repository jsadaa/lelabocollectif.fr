<?php
include_once('./config/mysql.php');

//We get all the posts in the database
$getPosts = $mysqlClient->prepare('SELECT * FROM posts');
$getPosts->execute();
$posts = $getPosts->fetchAll();

//We get all the users in the database
$getUsers = $mysqlClient->prepare('SELECT * FROM users');
$getUsers->execute();
$users = $getUsers->fetchAll();

//Function to display the author in the posts
function displayAuthor(string $authorEmail, array $users) : string
{
    for ($i = 0; $i < count($users); $i++) {
        $author = $users[$i];
        if ($authorEmail === $author['full_name']) {
            return $author['full_name'] . ' / Contact : ' . $author['email'];
        }
    }
}

//Function to determine if the post is enabled
function isValidPosts(array $post) : bool
{
    if (array_key_exists('is_enabled', $post)) {
        $isEnabled = $post['is_enabled'];
    } else {
        $isEnabled = false;
    }

    return $isEnabled;
}

//Function to get all the posts enabled to display in the forum
function getPosts(array $posts) : array
{
    $valid_posts = [];

    foreach($posts as $post) {
        if (isValidPosts($post)) {
            $valid_posts[] = $post;
        }
    }

    return $valid_posts;
}
?>