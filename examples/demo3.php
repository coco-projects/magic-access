<?php

    require '../vendor/autoload.php';

    class A
    {
        public mixed $b;
        use \Coco\magicAccess\MagicMethod;
    }

    $a = new A();

    $a->b          = [];
    $a->b[]        = 'a';
    $a->b[][]      = 'b';
    $a->b[][]['h'] = 'c';

    //b
    echo $a->b[1]['0'];

    //c
    echo $a->b[2][0]['h'];

    print_r($a->b);
    exit;;