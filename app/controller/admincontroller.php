<?php

namespace MVC\controller;

use MVC\core\controller;
use MVC\model\users;
use MVC\model\adminpost;
use MVC\core\session;
class admincontroller extends controller{
    function __construct()
    {   
        @$session = new session;
        // echo $_SESSION['token'];
        // if(!isset($_SESSION['token'])){
        //     echo"class not exist";
        // }
        if(session::get("token")==null|| session::get("per") !=100){
            echo"class not exist";die;
        }

        
    }
function index(){
    $title="adminpage";
    $this->view("home/admin/index",['title'=>$title]);
}

}

?>