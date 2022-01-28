<?php
namespace MVC\controller;

use MVC\core\controller;
use MVC\model\users;
use MVC\core\cookies;
class usercontroller extends controller{
    
    public function token(){
        //Generate a random string.
         $token = openssl_random_pseudo_bytes(32);
 
 //Convert the binary data into hexadecimal representation.
             $token = bin2hex($token);
 
 //Print it out for example purposes.
             return $token;
    }
    function login(){
        $this->view("home/login",['title'=>"zeazo"]);
    }
     function  postlogin(){
        $token = $this->token();
        $username = $_POST['username'];
        //echo $username;
        $password = $_POST['password'];
       
        $user = new users;
        $query = $user->getuser($username,$password);
 
        echo"<pre>";
        print_r($query);
        if(!empty($query)){
            $user->update_token($token,$username,$password);
            cookies::set("token",$token);
           //header("location:/task1mvc/public/home");
           //exit;
        }
        // }else{
        //     header("location:/task1mvc/public/auth/login");
        //     exit;
        // }
        
        //$query1 =db::sql("select * from users where username = ? and password = ?",array($username,$password),0,"");
        // if($query1->rowCount() ==1){
        //     $rows=$query1->fetchAll(PDO::FETCH_ASSOC);
        //     foreach($rows as $row){
                
        //         $id = $row['id'];
               
        //     }
        //     $query2=db::sql("update users set token =? where id = ?",array($token,$id),0,"");
        //      setcookie("token",$token,time()+ ( 365 * 24 * 60 * 60)) ;
        //     header("location:index.php");
        //     exit;
            
        // }
    }
}

?>