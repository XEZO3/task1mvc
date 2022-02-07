<?php

namespace MVC\model;
use MVC\core\model;
use MVC\core\session;
use MVC\model\users;
class adminpost extends model{
    function getPosts(){
      $sql = "
      
      select posts.text,posts.id,posts.title,users.username from posts left join users on posts.publisher_id = users.id
      ";
      $rows=  model::db()->rows($sql);
      return $rows;
    }
    function detetPost($id){
      $rows = model::db()->delete('posts', ['id'=>$id]);
      return $rows;
      
    }
    function insertPost(){
     $data=[
       'publisher_id'=>session::get("id"),
       'title'=>$_POST['title'],
       'text'=>$_POST['text'],
       'category_id'=>$_POST['category']
     ];
      $rows=  model::db()->insert('posts', $data);
      return $rows;
    }
    function getCategory(){
      $rows=  model::db()->rows("select * from category");
      return $rows;
    }
    function getByCategory($id){
      $rows=  model::db()->rows("select posts.text,posts.id,posts.title,users.username from posts  join users on posts.publisher_id = users.id where category_id  = ?",[$id]);
      return $rows;
    }
}

?>