<?php
namespace MVC\controller;

use MVC\core\controller;
use MVC\model\users;
use MVC\core\cookies;
use MVC\core\session;

class usercontroller extends controller{
    function __construct()
    {
        $session = new session;
    }
    public function token(){
        //Generate a random string.
         $token = openssl_random_pseudo_bytes(32);
 
 //Convert the binary data into hexadecimal representation.
             $token = bin2hex($token);
 
 //Print it out for example purposes.
             return $token;
    }
    function login(){
        $this->view("home/pages/login",['title'=>"zeazo"]);
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
            session::set("token",$token);
            session::set("id",$query->id);
            session::set("per",$query->permession);
            session::set("username",$username);
            if($query->permession=100){
                header("location:/task1mvc/public/admin");
                exit;
            }else{
           header("location:/task1mvc/public/home");
           exit;
            }
        }else{
            echo"user name or password wrong";
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