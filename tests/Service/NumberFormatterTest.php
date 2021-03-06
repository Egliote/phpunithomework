<?php

namespace App\Tests\Service;

use App\Service\NumberFormatter;
use PHPUnit\Framework\TestCase;

class NumberFormatterXTest extends TestCase
{
    public function getConvertData()
    {
        return
            [
                ['0', '0'],
                ['0.1', '0.10'],
                ['-0.1', '-0.10'],
                ['0.111111111', '0.11'],
                ['0.119999999', '0.12'],
                ['533.1', '533.10'],
                ['66.6666', '66.67'],
                ['12.00', '12'],
                ['999.9999', '1 000'],
                ['999.99', '999.99'],
                ['1000.99', '1 001'],
                ['1000.34', '1 000'],
                ['99949', '99 949'],
                ['99949.1', '99 949'],
                ['99949.9', '99 950'],
                ['99950', '100K'],
                ['99950.1', '100K'],
                ['99950.5', '100K'],
                ['535216', '535K'],
                ['535216.999999', '535K'],
                ['535999.999999', '536K'],
                ['535999', '536K'],
                ['999499', '999K'],
                ['999499.1', '999K'],
                ['999499.9', '1.00M'],
                ['999500', '1.00M'],
                ['999500.1', '1.00M'],
                ['999500.9', '1.00M'],
                ['999500123.989578', '999.50M'],
                ['999999.9', '1.00M'],
                ['25000567', '25.00M'],
                ['-0', '0'],
                ['-533.1', '-533.10'],
                ['-66.6666', '-66.67'],
                ['-12.00', '-12'],
                ['-999.9999', '-1 000'],
                ['-999.99', '-999.99'],
                ['-1000.99', '-1 001'],
                ['-1000.34', '-1 000'],
                ['-99949', '-99 949'],
                ['-99949.1', '-99 949'],
                ['-99949.9', '-99 950'],
                ['-99950', '-100K'],
                ['-99950.1', '-100K'],
                ['-99950.5', '-100K'],
                ['-535216', '-535K'],
                ['-535216.999999', '-535K'],
                ['-535999.999999', '-536K'],
                ['-535999', '-536K'],
                ['-999499', '-999K'],
                ['-999499.1', '-999K'],
                ['-999499.9', '-1.00M'],
                ['-999500', '-1.00M'],
                ['-999500.1', '-1.00M'],
                ['-999500.9', '-1.00M'],
                ['-999500123.989578', '-999.50M'],
                ['-999999.9', '-1.00M'],
                ['-25000567', '-25.00M'],
            ];
    }

    /**
     * @param $nr
     * @param $expected
     * @dataProvider getConvertData
     */
    public function testFormatting($nr, $expected)
    {
        $formatter=new NumberFormatter();
        $value=$formatter->format_number($nr);
        $this->assertEquals($expected, $value);
    }
}