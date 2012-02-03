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
require __DIR__."/../Map.php";

use \mageekguy\atoum;
use \Knp\Google\StaticMapApi as Api;

Class Map extends atoum\test
{
    public function test__toString()
    {
        $map = new Api\Map(new Api\Point(-45.75,164.5923), "512x512", 8);
        $this->mapTester($map, sprintf("%s?sensor=false&center=-45.750000,164.592300&size=512x512&zoom=8", Api\Map::URL));

        $map->paths = array('test_path1', 'test_path2');
        $this->mapTester($map, sprintf("%s?sensor=false&center=-45.750000,164.592300&size=512x512&zoom=8&test_path1&test_path2", Api\Map::URL));

        $map->markers = array('test_markers1', 'test_markers2');
        $this->mapTester($map, sprintf("%s?sensor=false&center=-45.750000,164.592300&size=512x512&zoom=8&test_markers1&test_markers2&test_path1&test_path2", Api\Map::URL));

        $map->format = 'test_format';
        $this->mapTester($map, sprintf("%s?sensor=false&center=-45.750000,164.592300&size=512x512&zoom=8&format=test_format&test_markers1&test_markers2&test_path1&test_path2", Api\Map::URL));

        $map->maptype = 'test_maptype';
        $this->mapTester($map, sprintf("%s?sensor=false&center=-45.750000,164.592300&size=512x512&zoom=8&format=test_format&maptype=test_maptype&test_markers1&test_markers2&test_path1&test_path2", Api\Map::URL));

        $map->scale = 2;
        $this->mapTester($map, sprintf("%s?sensor=false&center=-45.750000,164.592300&size=512x512&zoom=8&scale=2&format=test_format&maptype=test_maptype&test_markers1&test_markers2&test_path1&test_path2", Api\Map::URL));
    }

    protected function mapTester(Api\Map $map, $expected_value)
    {
        $this->assert
            ->string((string) $map)->isEqualTo($expected_value);

        return $this;
    }
}


