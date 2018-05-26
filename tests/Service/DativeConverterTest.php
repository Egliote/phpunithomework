<?php

namespace App\Tests\Service;

use App\Service\DativeConverter;
use PHPUnit\Framework\TestCase;

class DativeConverterTest extends TestCase
{
    public function getConvertData()
    {
        return
        [
        ['Oleg', 'Oleg'],
            ['Jurgis', 'Jurgiui'],
            ['Kastytis', 'Kastyčiui'],
            ['Paulius', 'Pauliui'],
            ];
    }

    /**
     * @param $name
     * @param $expected
     * @dataProvider getConvertData
     */
    public function testConvert($name, $expected)
    {
        $converter=new DativeConverter();
        $value=$converter->convert($name);
        $this->assertEquals($expected, $value);
    }

//    {
//        $converter=new DativeConverter();
//        $value=$converter->convert('Oleg');
//        $this->assertEquals('Oleg', $value);
//    }
//    public function testConvertKastytis()
//    {
//        $converter=new DativeConverter();
//        $value=$converter->convert('Kastytis');
//        $this->assertEquals('Kastyčiui', $value);
//    }
}