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
require __DIR__."/../Color.php";

use \mageekguy\atoum;
use \Knp\Google\StaticMapApi as Api;

Class Color extends atoum\test
{
    public function test__toString()
    {
        $this->colorTester(new Api\Color(128, 128, 128), "0x808080")
            ->colorTester(new Api\Color(128, 128, 0), "0x808000")
            ->colorTester(new Api\Color(128, 0, 128), "0x800080")
            ->colorTester(new Api\Color(0, 128, 128), "0x008080")
            ->colorTester(new Api\Color(0, 0, 0), "0x000000")
            ;
    }

    protected function colorTester(Api\Color $color, $expected_value)
    {
        $this->assert
            ->string((string) $color)->isEqualTo($expected_value);

        return $this;
    }
}
