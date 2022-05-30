<?php

if (isset($_GET['action'])) 
{
    if ($_GET['action'] == 'displayDocumentation') 
    {
        require('src/controllers/front/index.php');
        displayDocumentation();
    }

    elseif ($_GET['action'] == 'displayContact') 
    {
        require('src/controllers/front/contact.php');
        displayContact();
    }

    elseif ($_GET['action'] == 'displaySubmitContact') 
    {
        require('src/controllers/front/contact.php');
        try
        {
            if ((!empty($_POST['name'])) && (!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
            && (!empty($_POST['message']) && (!empty($_POST['message'])))) 
            {   
                sendMail();
                displaySubmitContact();
            } else 
            {
                throw new Exception('Il manque des informations pour envoyer votre message...');
            }
        } catch(Exception $e)
        {
            $msgErreur = $e->getMessage();
            require 'templates/front/error.php';
        }   
    }

    elseif ($_GET['action'] == 'displayForum') 
    {
        require('src/controllers/front/forum.php');
        loginCheck();
        if (isset($_SESSION['LOGGED_USER']))
        {
            dbConnect();
            $posts = getPosts();   
            displayForum();   
        } else 
        {
            displayLogin();
        }
    }
    
    elseif ($_GET['action'] == 'displayLogout') 
    {
        require('src/controllers/front/forum.php');
        displayLogout();
    }

    elseif ($_GET['action'] == 'displayCreateUser') 
    {
        require('src/controllers/front/forum.php');
        displayCreateUser();
    }

    elseif ($_GET['action'] == 'submitUser') 
    {
        require('src/controllers/front/forum.php');
        submitUser();
        displaySubmitUser();
    }

    elseif ($_GET['action'] == 'displayDeleteUser') 
    {
        require('src/controllers/front/forum.php');
        displayDeleteUser();
    }

    elseif ($_GET['action'] == 'submitDeleteUser') 
    {    
        require('src/controllers/front/forum.php');
        $old_timestamp = time() - (15*60);
        try 
        {
        if (isset($_SESSION['delete_user_token']) && isset($_SESSION['delete_user_token_time']) && isset($_POST['delete_user_token']) 
        && ($_SESSION['delete_user_token'] == $_POST['delete_user_token']) && ($_SESSION['delete_user_token_time'] >= $old_timestamp)) 
        {
            if (isset($_GET['id'])) 
            {
                SubmitDeleteUser();
                displaySubmitDeleteUser();
            } else 
            {
                throw new Exception('Il manque des informations pour supprimer votre compte...');
            }
        } else 
        {
            throw new Exception("Vous n'avez pas les droits nécéssaires pour supprimer un compte...");
        }
        } catch(Exception $e)
        {
            $msgErreur = $e->getMessage();
            require 'templates/front/error.php';
        } 
    }
    
    elseif ($_GET['action'] == 'displayCreatePost') 
    {
        require('src/controllers/front/forum.php');
        displayCreatePost();
    }

    elseif ($_GET['action'] == 'submitPost') 
    {
        require('src/controllers/front/forum.php');
        $old_timestamp = time() - (15*60);
        try 
        {
            if(isset($_SESSION['create_token']) && isset($_SESSION['create_token_time']) && isset($_POST['create_token']) 
            && ($_SESSION['create_token'] == $_POST['create_token']) && ($_SESSION['create_token_time'] >= $old_timestamp)) 
            {
                $title = $_POST['title'];
                $post = $_POST['post'];
                if (isset($title) || !empty($post)) 
                {
                    dbConnect();
                    submitPost();
                    displaySubmitPost();

                } else 
                {
                    throw new Exception('Il manque des informations pour soumettre votre publication...');
                }
            } else 
            {
                throw new Exception("Vous n'avez pas les droits nécéssaires pour soumettre une publication...");
            }
        } catch(Exception $e)
        {
            $msgErreur = $e->getMessage();
            require 'templates/front/error.php';
        } 
    } 

    elseif ($_GET['action'] == 'displayUpdatePost') 
    {
        require('src/controllers/front/forum.php');
        retrievePost();
        displayUpdatePost();
    }

    elseif ($_GET['action'] == 'submitUpdatePost') 
    {
        require('src/controllers/front/forum.php');
        $old_timestamp = time() - (15*60);
        try 
        {
            if (isset($_SESSION['update_token']) && isset($_SESSION['update_token_time']) && isset($_POST['update_token']) 
            && ($_SESSION['update_token'] == $_POST['update_token']) && ($_SESSION['update_token_time'] >= $old_timestamp)) 
            {
                $title = $_POST['title'];
                $post = $_POST['post'];
                if (isset($title) || !empty($post)) {
                    submitUpdatePost();
                    displaySubmitUpdatePost();
                } else 
                {
                    throw new Exception('Il manque des informations pour modifier votre publication...');
                }
            } else 
            {
                throw new Exception("Vous n'avez pas les droits nécéssaires pour modifier une publication...");
            }
        } catch(Exception $e)
        {
            $msgErreur = $e->getMessage();
            require 'templates/front/error.php';
        } 
        
    }

    elseif ($_GET['action'] == 'displayDeletePost') 
    {
        require('src/controllers/front/forum.php');
        displayDeletePost();
    }

    elseif ($_GET['action'] == 'submitDeletePost') 
    {
        require('src/controllers/front/forum.php');
        $old_timestamp = time() - (15*60);
        try 
        {
            if(isset($_SESSION['delete_token']) && isset($_SESSION['delete_token_time']) && isset($_POST['delete_token']) 
            && ($_SESSION['delete_token'] == $_POST['delete_token']) && ($_SESSION['delete_token_time'] >= $old_timestamp)) 
            {
                if (isset($_POST['id'])) {
                submitDeletePost();
                displaySubmitDeletePost();
                } else 
                {
                    throw new Exception('Il manque des informations pour supprimer votre publication...');
                }
            } else 
            {
                throw new Exception("Vous n'avez pas les droits nécéssaires pour supprimer une publication...");
            }
        } catch(Exception $e)
        {
            $msgErreur = $e->getMessage();
            require 'templates/front/error.php';
        } 
    }
}

else 
{
    require('src/controllers/front/index.php');
    displayIndex();
}