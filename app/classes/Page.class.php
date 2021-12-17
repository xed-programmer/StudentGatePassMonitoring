<?php

class Page{    
    public static function asset($link)
    {
        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";  
        $host = $protocol . $_SERVER['HTTP_HOST'] . '/studentgatepassmonitoring';  

        return $host . $link;
    }

    public static function route($uri)
    {
        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";  
        $host = $protocol . $_SERVER['HTTP_HOST'] . '/studentgatepassmonitoring';  

        header('Location: '. $host . $uri);
        exit();
    }

    public static function getCurrentURI()
    {
        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
 
        $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        return $url;
    }
}