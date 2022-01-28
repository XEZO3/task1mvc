<?php

namespace MVC\core;

class cookies{
static function set($name,$value){
setcookie($name,$value,time()+( 365 * 24 * 60 * 60),"/");
}
static function get($name){
return $_COOKIE["$name"];
}
}
?>