<?php

function autoloadclass($l){      
    spl_autoload_register(function ($class) use ($l)
{         
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class).'.class.php';
    $back = '';
    for($i = 0; $i < $l; $i++){
        $back .= '../';
    }
    $fullpath = $back . $file;
    if(!file_exists($fullpath)){              
        return false;
    }
            
    include $fullpath;
});
}
?>