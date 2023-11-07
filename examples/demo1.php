<?php

    require '../vendor/autoload.php';

    $m = new \Coco\magicAccess\MagicArray();

    $m[]   = 'array';
    $m[][] = 'array222';

    var_export($m->getData());
    /*

    [
        0 => 'array',
        1 => [
            0 => 'array222',
        ],
    ]

     *
     */
