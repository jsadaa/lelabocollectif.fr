<?php 

require 'src/models/forum.php';

session_start();

function displayLogin() 
{
    require('templates/front/login.php');
}

function displayLogout() 
{
    require('templates/front/logout.php');
    session_start();
    session_destroy();
}

function displayCreateUser() 
{
    require('templates/front/createUser.php');
}

function displaySubmitUser() 
{
    require('templates/front/submitUser.php');
}

function displayDeleteUser() 
{
    $_SESSION['delete_user_token'] = uniqid(rand(), true);
    $_SESSION['delete_user_token_time'] = time();
    require('templates/front/deleteUser.php');
}

function displaySubmitDeleteUser() 
{
    require('templates/front/submitDeleteUser.php');
    session_start();
    session_destroy();
}

function displayForum() 
{
    $posts = getPosts();
    $users = getUsers();
    require('templates/front/forum.php');
}

function displayCreatePost() 
{
    $_SESSION['create_token'] = uniqid(rand(), true);
    $_SESSION['create_token_time'] = time();
    require('templates/front/createPost.php');
}

function displaySubmitPost() 
{
    $title = $_POST['title'];
    $post = $_POST['post'];
    require('templates/front/submitPost.php');
}

function displayUpdatePost() 
{
    $post = retrievePost();
    $_SESSION['update_token'] = uniqid(rand(), true);
    $_SESSION['update_token_time'] = time();
    require('templates/front/updatePost.php');
}

function displaySubmitUpdatePost() 
{
    require('templates/front/submitUpdatePost.php');
}

function displayDeletePost() 
{
    $_SESSION['delete_token'] = uniqid(rand(), true);
    $_SESSION['delete_token_time'] = time();
    require('templates/front/deletePost.php');
}

function displaySubmitDeletePost() 
{
    require('templates/front/submitDeletePost.php');
}




