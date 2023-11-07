<?php

    require '../vendor/autoload.php';

    class A
    {
        use \Coco\magicAccess\MagicMethod;
    }

    $a = new A();

    $a->b = [];
    $a->c = 123456;

    $bb = &$a->c;

    $bb = 888888;

    //888888
    echo $a->c;

    unset($a->c);
    array_push($a->b, 1);
    array_push($a->b, 2);

    print_r($a);
    /*
    Object
    (
        [b] => Array
       (
                   [0] => 1
                   [1] => 2
        )

    )
    */