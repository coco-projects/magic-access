<?php

    require '../vendor/autoload.php';

    $m = new \Coco\magicAccess\MagicArray();

    array_push($m[], 212);
    array_push($m[1], 22);

    //212
    print_r($m[0][0]);
