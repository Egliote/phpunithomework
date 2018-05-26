<?php

namespace App\Service;

class NumberFormatter
{

    public function format_number($n)
    {
        $precision=2;
        $n2 = $n;
        if ($n2 < 0) {
            $n = abs($n);
        }

        if (($n < 1000) && ($n >= 0)) {
            // 0 - 1000
            $n_format = number_format($n, $precision, '.', ' ');
            if ($precision > 0) {
                $dotzero = '.' . str_repeat('0', $precision);
                $n_format = str_replace($dotzero, '', $n_format);
            }
            $suffix = '';
        } else if (($n >= 1000) && ($n < 99950)) {
            // 1000-99 950
            $n_format = number_format($n, 0, '.', ' ');

            if ($n_format == '99 950') {
                $n_format = 100;
                $suffix = 'K';
            } else {
                $suffix = '';
            }

        } else if (($n >= 99950) && ($n < 999500)) {
            // 99 500-999 500
            if ($n >= 99950 && $n < 100000) {
                $n_format = 100;
            } else {
                $n_format = number_format($n / 1000);
            }
            if ($n_format == '999 950') {
                $n_format = number_format(1, $precision, '.', ' ');
                $suffix = 'M';
            } else {
                $suffix = 'K';
            }
        } else if ($n >= 999500) {
            // 999 500-...
            if ($n >= 999500 && $n <= 1000000) {
                $n_format = number_format(1, $precision, '.', ' ');
            } else {
                $n_format = number_format($n / 1000000, $precision, '.', ' ');
            }
            $suffix = 'M';
        }

        if ($n2 < 0) {
            $n_format = '-'.$n_format;
        }
        return $n_format . $suffix;
    }
}