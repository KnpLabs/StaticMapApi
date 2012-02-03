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
require __DIR__."/../MarkerCollection.php";

use \mageekguy\atoum;
use \Knp\Google\StaticMapApi as Api;

Class MarkerCollection extends atoum\test
{
    public function test__toString()
    {
        $marker_collection = new Api\MarkerCollection();

        $marker_collection->points = array(new Api\Point(0,0), 'Nantes');
        $this->marker_collectionTester($marker_collection, "markers=Nantes|0.000000,0.000000");

        $marker_collection->shadow = false;
        $this->marker_collectionTester($marker_collection, "markers=shadow:false|Nantes|0.000000,0.000000");

        $marker_collection->label = "A";
        $this->marker_collectionTester($marker_collection, "markers=shadow:false|label:A|Nantes|0.000000,0.000000");

        $marker_collection->size = Api\MarkerCollection::SIZE_TINY;
        $this->marker_collectionTester($marker_collection, "markers=shadow:false|label:A|size:tiny|Nantes|0.000000,0.000000");

        $marker_collection->size = Api\MarkerCollection::SIZE_SMALL;
        $this->marker_collectionTester($marker_collection, "markers=shadow:false|label:A|size:small|Nantes|0.000000,0.000000");

        $marker_collection->size = Api\MarkerCollection::SIZE_MID;
        $this->marker_collectionTester($marker_collection, "markers=shadow:false|label:A|size:mid|Nantes|0.000000,0.000000");

        $marker_collection->color = 'green';
        $this->marker_collectionTester($marker_collection, "markers=shadow:false|label:A|size:mid|color:green|Nantes|0.000000,0.000000");

    }

    protected function marker_collectionTester(Api\MarkerCollection $marker_collection, $expected_value)
    {
        $this->assert
            ->string((string) $marker_collection)->isEqualTo($expected_value);

        return $this;
    }
}

