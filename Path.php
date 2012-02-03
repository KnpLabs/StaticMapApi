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

class Path
{
    public $color;
    public $points = array();
    public $weight;

    public function __toString()
    {
        $url_params = array();
        if (!is_null($this->color)) {
            $url_params[] = sprintf("color:%s", $this->color);
        }

        if (!is_null($this->weight)) {
            $url_params[] = sprintf("weight:%d", $this->weight);
        }

        $url_params[] = join('|', $this->points);

        return sprintf("path=%s", join('|', $url_params));
    }
}

