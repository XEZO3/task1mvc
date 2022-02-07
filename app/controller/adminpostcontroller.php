<?php

namespace MVC\controller;

use MVC\core\controller;
use MVC\model\users;
use MVC\model\adminpost;
use MVC\core\session;
class adminpostcontroller extends controller{
    function __construct()
    {   
        @$session = new session;
        // echo $_SESSION['token'];
        // if(!isset($_SESSION['token'])){
        //     echo"class not exist";
        // }
        if(session::get("token")==null){
            echo"class not exist";die;
        }
    }
    function index($id){
        
            $post = new adminpost;
            $data = !empty($id) ? $post->getByCategory($id[0]) : $post->getPosts()  ;
            $category = $post->getCategory(); 
            $this->view("home/admin/posts",['rows'=>$data,'category'=>$category]);
        
    }
    function delete($id){
        $post = new adminpost;
        $post->detetPost($id[0]);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
    }
    function insert(){
        $post = new adminpost;
        $post->insertPost();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;

    }
}




?>