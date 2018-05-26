<?php

namespace App\Service;


class DativeConverter

{

    public function convert($name)

    {
// jurgIS
        if (mb_substr($name, -4) === 'ytis') {

            return mb_substr($name, 0, -3) . 'čiui';

        }

        if (mb_substr($name, -2) === 'is') {

            return mb_substr($name, 0, -2) . 'iui';

        }

        // pauliUS

        if (mb_substr($name, -2) === 'us') {

            return mb_substr($name, 0, -2) . 'ui';

        }


        // kastyTIS




        return $name;
    }
}