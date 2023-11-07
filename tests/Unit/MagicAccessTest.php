<?php

    declare(strict_types = 1);

    namespace Coco\Tests\Unit;

    use PHPUnit\Framework\TestCase;

final class MagicAccessTest extends TestCase
{
    public function testA()
    {
        $m = new \Coco\magicAccess\MagicArray();

        $m[]   = 'array';
        $m[][] = 'array222';

        $expection = [
            0 => 'array',
            1 => [
                0 => 'array222',
            ],
        ];
        $this->assertEquals($expection, $m->getData());

        array_push($m[100], 22);

        $this->assertEquals($m[100][0], 22);
    }

    public function testB()
    {
        $m          = new \Coco\magicAccess\MagicArray();
        $m[100]     = 111;
        $m['a']     = 'aaa';
        $m['b']     = [];
        $m['b'][]   = 'aaa111';
        $m['b'][][] = 'aaa111222';

        $expection = [
            100 => 111,
            'a' => 'aaa',
            'b' => [
                0 => 'aaa111',
                1 => [
                    0 => 'aaa111222',
                ],
            ],
        ];

        $this->assertEquals($expection, $m->getData());
    }

    public function testC()
    {
        $a = new A();

        $a->b          = [];
        $a->b[]        = 'a';
        $a->b[][]      = 'b';
        $a->b[][]['h'] = 'c';

        $expection = [
            0 => 'a',
            1 => [
                0 => 'b',
            ],
            2 => [
                0 => [
                    'h' => 'c',
                ],
            ],
        ];
        $this->assertEquals($expection, $a->b);
        $a->c = [];
        array_push($a->c, 1);
        array_push($a->c, 2);

        $this->assertEquals(1, $a->c[0]);
        $this->assertEquals(2, $a->c[1]);

        unset($a->c[0]);
        $this->assertFalse(isset($a->c[0]));
    }

    public function testD()
    {
        $a = new A();

        $a->a = 1;
        $a->b = 2;
        $a->c = 3;

        $h = $a->d;

        unset($a->d);
        $res = [];

        foreach ($a as $k => $v) {
            $res[] = $v;
        }

        $this->assertEquals($res, [
            1,
            2,
            3,
        ]);
    }

    public function testE()
    {
        $m = new \Coco\magicAccess\MagicArray();

        $m[]    = 1;
        $m['a'] = 2;
        $m['c'] = 3;

        $res = [];

        $this->assertTrue(isset($m['a']));
        $this->assertFalse(isset($m['d']));

        $m->eachField(function ($v, $k) use (&$res) {
            $res[] = $v;
        });

        $this->assertEquals($res, [
            1,
            2,
            3,
        ]);

        $this->assertEquals($m->count(), 3);

        unset($m['a']);
        $this->assertFalse(isset($m['a']));

        $m->destroy();
        $this->assertTrue($m->getData() == []);
    }
}
