<?php
spl_autoload_register(function ($name) {
    echo "Want to load $name.\n";
    throw new Exception("Unable to load $name.");
});

try {
    
} catch (Exception $e) {
    echo $e->getMessage(), "\n";
}


    $obj  = new MyClass1();
    $obj2 = new MyClass2(); 

?>