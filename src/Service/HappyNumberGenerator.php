<?php

namespace App\Service;

class HappyNumberGenerator
{
    public function generate()
    {
        return random_int(1, 10);
    }
}
