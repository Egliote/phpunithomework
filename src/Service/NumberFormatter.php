<?php

namespace App\Service;

class NumberFormatter
{
    public function format_number($n)
    {
        $precision = 2;
        $suffix = '';
        $positive = $n > 0;

        // Working with positive numbers only
        $n = abs($n);

        // Round the number first
        if($n < 1000) {
            $n = round($n, $precision);
        } else {
            $n = round($n);
        }

        // 0 - 1000
        if (($n < 1000) && ($n >= 0)) {
            $n_format = number_format($n, $precision, '.', ' ');
        }

        // 1000-99 950
        else if (($n >= 1000) && ($n < 99950)) {
            $n_format = number_format($n, 0, '.', ' ');
        }

        // 99 500-999 500
        else if (($n >= 99950) && ($n < 999500)) {
            if ($n >= 99950 && $n < 100000) {
                $n_format = '100';
            } else {
                $n_format = number_format($n / 1000);
            }
            $suffix = 'K';
        }

        // 999 500-...
        else if ($n >= 999500) {

            if ($n >= 999500 && $n <= 1000000) {
                $n_format = number_format(1, $precision, '.', ' ');
            } else {
                $n_format = number_format($n / 1000000, $precision, '.', ' ');
            }
            $suffix = 'M';
        }

        if (!$positive) {
            $n_format = '-'.$n_format;
        }
        return $n_format.$suffix;
    }
}