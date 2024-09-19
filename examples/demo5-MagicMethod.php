<?php

    require '../vendor/autoload.php';

    class A
    {
        use \Coco\magicAccess\MagicMethod;
    }

    $a = new A();

    $a->bbb = [];
    $a->ccc = 111;

    array_push($a->bbb, 1);
    $a->bbb[] = 2;
    $a->bbb[] = ['abc','def'];
    $a->bbb['a'] = 'aaa';

    print_r($a->bbb);
    echo PHP_EOL;

    $cc = &$a->ccc;
    $cc = 222;

    //222
    echo $a->ccc;
    echo PHP_EOL;

    unset($a->ccc);

    /*
Array
(
    [0] => 1
    [1] => 2
    [2] => Array
        (
            [0] => abc
            [1] => def
        )

    [a] => aaa
)

222
    */