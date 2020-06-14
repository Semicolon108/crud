<?php
    spl_autoload_register("loadClass");
    function loadClass($className){
        $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        if(strpos($url,'view') !== false){
            $path = "../Classes/";
        }else{
            $path = "Classes/";
        }
        $ext = ".php";
        $fullPath = $path.$className.$ext;
        if(!file_exists($fullPath)){
            return false;
        }
        require_once $fullPath;
    }
?>