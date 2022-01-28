<?php

namespace MVC\controller;

use MVC\core\controller;
use MVC\model\users;

class homecontroller extends controller{
function index(){
    $users = new users();
    $db = $users->getusers();
    $name = $users->username;
    $per = $users->per;
    // echo "<pre>";
    // var_dump($db);die;

    $this->view("home/homepage",['title'=>"zeazo","name"=>$name,'per'=>$per]);
}


}
?>