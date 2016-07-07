<?php

use PHPUnit\Framework\TestCase;
use Krasilich\Algo\Sort\Merge;

class MergeTest extends TestCase
{
    public function testSort()
    {
        $o = new Merge();
        $d = range(1, 10, 1);
        $a = $d;
        shuffle($a);
        $this->assertEquals($d, $o->sort($a));
    }
}
