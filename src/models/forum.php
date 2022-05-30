<?php 

function dbConnect() 
{
    require('src/models/hiddenVariables.php');
    try
    {
        $mysqlClient = new PDO(
            $sqlConfig,
            $sqlId,
            $sqlPassword,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
            ); 
        return $mysqlClient;
    }
    catch(Exception $e)
    {
        $msgErreur = $e->getMessage();
        require 'templates/front/error.php';
    }
}

function isValidPosts(array $post) : bool
{
    if (array_key_exists('is_enabled', $post)) {
        $isEnabled = $post['is_enabled'];
    } else {
        $isEnabled = false;
    }
    return $isEnabled;
}

function getValidPosts(array $posts) : array
{
    $valid_posts = [];
    foreach($posts as $post) {
        if (isValidPosts($post)) {
            $valid_posts[] = $post;
        }
    }
    return $valid_posts;
}

function displayAuthor(string $authorEmail, array $users) : string
{    
    for ($i = 0; $i < count($users); $i++) {
        $author = $users[$i];
        if ($authorEmail === $author['full_name']) {
            return $author['full_name'] . ' / Contact : ' . $author['email'];
        }
    }
}

function getUsers() : array
{
    try 
    {
        $mysqlClient = dbConnect();
        $getUsers = $mysqlClient->prepare('SELECT * FROM users');
        $getUsers->execute();
        $users = $getUsers->fetchAll();
        return $users;
    }
    catch(Exception $e)
    {
        $msgErreur = $e->getMessage();
        require 'templates/front/error.php';
    }
}

function getPosts() : array
{
    try 
    {
        $mysqlClient = dbConnect();
        $getPosts = $mysqlClient->prepare('SELECT * FROM posts');
        $getPosts->execute();
        $posts = $getPosts->fetchAll();
        return $posts;
    } 
    catch(Exception $e)
    {
        $msgErreur = $e->getMessage();
        require 'templates/front/error.php';
    }
}

function submitUser() 
{
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $password = $_POST['password'];
    $mysqlClient = dbConnect();
    $insertUser = $mysqlClient->prepare('INSERT INTO users(full_name, email, user_password, isAdmin, age) VALUES (:full_name, :email, :user_password, :isAdmin, :age)');
    $insertUser->execute([
    'full_name' => $full_name,
    'email' => $email,
    'user_password' => $password,
    'isAdmin' => 0,
    'age' => $age,
]);
}

function SubmitDeleteUser() 
{
    $mysqlClient = dbConnect();
    $id = $_GET['id'];
    $deleteUserStatement = $mysqlClient->prepare('DELETE FROM users WHERE full_name = :id');
    $deleteUserStatement->execute([
        'id' => $id,
    ]);
    $deletePostStatement = $mysqlClient->prepare('DELETE FROM posts WHERE author = :id');
    $deletePostStatement->execute([
        'id' => $id,
    ]);
}

function submitPost() 
{
    $title = $_POST['title'];
    $post = $_POST['post'];
    $mysqlClient = dbConnect();
    $insertPost = $mysqlClient->prepare('INSERT INTO posts(title, post, author, is_enabled) VALUES (:title, :post, :author, :is_enabled)');
    $insertPost->execute([
        'title' => $title,
        'post' => $post,
        'author' => $_SESSION['LOGGED_USER_NAME'],
        'is_enabled' => 1,   
    ]);
}

function retrievePost() 
{
    try 
    {
        $mysqlClient = dbConnect();
        $retrievePostStatement = $mysqlClient->prepare('SELECT * FROM posts WHERE post_id = :id');
        $retrievePostStatement->execute([
        'id' => $_GET['id'],]);
        $post = $retrievePostStatement->fetch(PDO::FETCH_ASSOC);
        return $post;
    } 
    catch(Exception $e)
    {
        $msgErreur = $e->getMessage();
        require 'templates/front/error.php';
    }
}

function submitUpdatePost() 
{
    try 
    {
        $mysqlClient = dbConnect();
        $id = $_POST['id'];
        $title = $_POST['title'];
        $post = $_POST['post'];
        $insertPostUpdate = $mysqlClient->prepare('UPDATE posts SET title = :title, post = :post WHERE post_id = :id');
        $insertPostUpdate->execute([
            'title' => $title,
            'post' => $post,
            'id' => $id,
    ]);
    } 
    catch(Exception $e)
    {
        $msgErreur = $e->getMessage();
        require 'templates/front/error.php';
    }
}

function submitDeletePost() 
{
    try 
    {
        $mysqlClient = dbConnect();
        $id = $_POST['id'];
        $deletePostStatement = $mysqlClient->prepare('DELETE FROM posts WHERE post_id = :id');
        $deletePostStatement->execute([
            'id' => $id,
        ]);
    } 
    catch(Exception $e)
    {
        $msgErreur = $e->getMessage();
        require 'templates/front/error.php';
    }
}

function loginCheck() 
{        
    if (isset($_POST['email']) && isset($_POST['password'])) 
    {
        $users = getUsers() ;
        foreach ($users as $user) 
        {
            if (
                $user['email'] === $_POST['email'] &&
                $user['user_password'] === $_POST['password']
            ) {
                $_SESSION['LOGGED_USER'] = $user['email'];
                $_SESSION['LOGGED_USER_NAME'] = $user['full_name'];
                $_SESSION['LOGGED_USER_IS_ADMIN'] = $user['isAdmin'];
            } 
        }
    }
}
