<?php

namespace Knp\Google\StaticMapApi\tests\units;

/**
 * Copyleft 2012 KnpLabs
 * Author Grégoire HUBERT <gregoire.hubert@knplabs.com>
 *
 * This code is free software provided as is with no warranty of any kind
 * and distributed under the * CC BY license. See LICENSE.txt for details.
 *
 * Google is a trademark of Google inc. 
 *
 * By using Google's APIs you DO AGREE to their terms of use
 * http://code.google.com/intl/fr-FR/apis/maps/terms.html
 *
 * This work is not an official Google product and has nothing to do
 * with anyone working at Google inc. 
 **/

require "mageekguy.atoum.phar";
require __DIR__."/../Point.php";

use \mageekguy\atoum;
use \Knp\Google\StaticMapApi\Point as ApiPoint;

Class Point extends atoum\test
{
    public function test__toString()
    {
        $this->pointTester(new ApiPoint(48.383, -0.5), "48.383000,-0.500000")
            ->pointTester(new ApiPoint(-0.00034, 192.123456), "-0.000340,192.123456")
            ->pointTester(new ApiPoint(-0.0000001, 0.0000001), "-0.000000,0.000000")
            ->pointTester(new ApiPoint(-0.0000006, 0.0000006), "-0.000001,0.000001")
            ->pointTester(new ApiPoint(-0.0000005, 0.0000005), "-0.000000,0.000000")
            ;
    }

    protected function pointTester(ApiPoint $point, $expected_value)
    {
        $this->assert
            ->string((string) $point)->isEqualTo($expected_value);

        return $this;
    }
}
