
# magic access

##### \ArrayAccess, \Countable, \IteratorAggregate and __set,__get implementations

---


## Installation

You can install the package via composer:

```bash
composer require coco-project/magic-access
```


### Here's a quick example:

```php
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

```


```php
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

```

```php
<?php

    require '../vendor/autoload.php';

    class A
    {
        use \Coco\magicAccess\MagicMethod;
    }

    $a = new A();

    $a->b   = [];
    $a->b[] = 'a';
    $a->b[][] = 'b';
    $a->b[][]['h'] = 'c';

    //b
    echo $a->b[1]['0'];

    //c
    echo $a->b[2][0]['h'];

```

```php
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

```

```php
<?php

    require '../vendor/autoload.php';

    $m = new \Coco\magicAccess\MagicArray();

    array_push($m[], 212);
    array_push($m[1], 22);

    //212
    print_r($m[0][0]);


```


## Testing

``` bash
composer test
```

## License

---

MIT
