<?php
namespace App\Tests\Service;

use App\Service\NumberFormatter;
use App\Service\MoneyFormatter;
use PHPUnit\Framework\TestCase;

class MoneyFormatterTest extends TestCase
{
    public function testformatEurUsd()
    {
        $nr_formatter=$this->createMock(NumberFormatter::class);
        $nr_formatter->expects($this->atLeastOnce())
            ->method('format_number')
            ->willReturn(100);

        $money=new MoneyFormatter($nr_formatter);
        $resultEur= $money->formatEur(100);
        $resultUsd= $money->formatUsd(100);

        $this->assertEquals('100 €', $resultEur);
        $this->assertEquals('$100', $resultUsd);
    }
}