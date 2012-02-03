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

class MarkerCollection
{
    public $points = array();
    public $color;
    public $label;
    public $size;
    public $shadow = true;

    const SIZE_TINY  = 'tiny';
    const SIZE_SMALL = 'small';
    const SIZE_MID   = 'mid';

    public function __toString()
    {
        $url_params = $this->points;


        if (!is_null($this->color)) {
            $url_params[] = sprintf("color:%s", $this->color);
        }

        if (!is_null($this->size)) {
            $url_params[] = sprintf("size:%s", $this->size);
        }

        if (!is_null($this->label)) {
            $url_params[] = sprintf("label:%s", $this->label);
        }

        if ($this->shadow === false) {
            $url_params[] = "shadow:false";
        }

        return sprintf("markers=%s", join("|", array_reverse($url_params)));
    }
}

