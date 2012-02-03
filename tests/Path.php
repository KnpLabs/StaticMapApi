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
require __DIR__."/../Path.php";

use \mageekguy\atoum;
use \Knp\Google\StaticMapApi as Api;

Class Path extends atoum\test
{
    public function test__toString()
    {
        $path = new Api\Path();
        $path->points = array(new Api\Point(47.233, -1.583), new Api\Point(46.845, -2.28));
        $this->pathTester($path, "path=47.233000,-1.583000|46.845000,-2.280000");

        $path->weight = 1;
        $this->pathTester($path, "path=weight:1|47.233000,-1.583000|46.845000,-2.280000");

        $path->color = "green";
        $this->pathTester($path, "path=color:green|weight:1|47.233000,-1.583000|46.845000,-2.280000");
    }

    protected function pathTester(Api\Path $path, $expected_value)
    {
        $this->assert
            ->string((string) $path)->isEqualTo($expected_value);

        return $this;
    }
}
