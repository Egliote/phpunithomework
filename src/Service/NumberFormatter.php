<?php

namespace App\Service;

class NumberFormatter
{
    public function format_number($n)
    {
        $precision = 2;
        $sign = $n < 0 ? '-' : '';

        //Whole absolute value
        $abs = abs($n);

        // Rounded absolute value
        if ($abs < 1000) {
            $round = round($abs, $precision);
        } else {
            $round = round($abs);
        }
       
        // 0 - 1000
        if (($abs < 1000) && (($round < 1000)) && ($abs >= 0)) {
            return $sign . $n_format = number_format($round, $precision, '.', ' ');
        }

        // 1000-99 950
        if (($round >= 1000) && ($abs < 99950)) {
            return $sign . $n_format = number_format($round, 0, '.', ' ');
        }

        // 99 500-999 500
        if (($abs >= 99950) && ($abs < 999500) && ($round < 999500)) {
            if ($abs >= 99950 && $abs < 100000) {
                $n_format = '100';
            } else {
                $n_format = number_format($round / 1000);
            }
            $suffix = 'K';
            return $sign . $n_format . $suffix;
        }

        // 999 500-...
        if ($round >= 999500) {

            if ($round >= 999500 && $round <= 1000000) {
                $n_format = number_format(1, $precision, '.', ' ');
            } else {
                $n_format = number_format($round / 1000000, $precision, '.', ' ');
            }
            $suffix = 'M';
            return $sign . $n_format . $suffix;
        }
    }
}