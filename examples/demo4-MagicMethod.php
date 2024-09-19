<?php

    require '../vendor/autoload.php';

    class A
    {
        use \Coco\magicAccess\MagicMethod;
    }

    $a = new A();

    $a->b          = [];
    $a->b[]        = 'a';
    $a->b[][]      = 'b';
    $a->b[][]['h'] = 'c';

    //b
    echo $a->b[1]['0'];
    echo PHP_EOL;

    //c
    echo $a->b[2][0]['h'];
    echo PHP_EOL;

    print_r($a->b);
    echo PHP_EOL;
