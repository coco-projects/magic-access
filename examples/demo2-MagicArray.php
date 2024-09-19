<?php

    require '../vendor/autoload.php';

    $m          = new \Coco\magicAccess\MagicArray();
    $m[100]     = 111;
    $m['a']     = 'aaa';
    $m['b']     = [];
    $m['b'][]   = 'aaa111';
    $m['b'][][] = 'aaa111222';

    var_export($m->getData());

    /*
    [
        100 => 111,
        'a' => 'aaa',
        'b' => [
            0 => 'aaa111',
            1 => [
                0 => 'aaa111222',
            ],
        ],
    ]
    */