<?php
/**
 * Created by PhpStorm.
 * User: egliote
 * Date: 18.5.22
 * Time: 18.37
 */

namespace App\Service;


class MoneyFormatter
{
    /**
     * @var NumberFormatter
     */
    private $nrformatter;


    public function __construct(NumberFormatter $formatter)
    {
        $this->nrformatter = $formatter;
    }

    public function formatEur($number)
    {
        $value = $this->nrformatter->format_number($number);
        return $value.' €';
    }

    public function formatUsd($number)
    {
        $value = $this->nrformatter->format_number($number);
        return '$'.$value;
    }
}