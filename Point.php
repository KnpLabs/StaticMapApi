<?php

namespace Knp\Google\StaticMapApi;

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

Class Point
{
    public $x;
    public $y;

    public function __construct($x, $y)
    {
        $this->x = (float) $x;
        $this->y = (float) $y;
    }

    public function __toString()
    {
        return sprintf("%.6f,%.6f", $this->x, $this->y);
    }

}

