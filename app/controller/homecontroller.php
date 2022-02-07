<?php

namespace MVC\controller;

use MVC\core\controller;
use MVC\model\users;

class homecontroller extends controller{
function index(){
    $users = new users();
    $db = $users->getusers();
   
    // echo "<pre>";
    // var_dump($db);die;

    $this->view("home/pages/homepage",['title'=>"zeazo"]);
}


}
?>