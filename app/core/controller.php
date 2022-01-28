<?php
namespace MVC\core;

class controller{
    function view($path,$parm){
        extract($parm);
        include(VIEW.$path.'.php');
    }
    
}

?>