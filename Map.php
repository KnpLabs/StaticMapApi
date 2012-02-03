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

class Map
{
    public $center,
              $maptype,
              $zoom,
              $size,
              $scale,
              $format,
              $markers = array(),
              $paths = array();

    const URL = "http://maps.googleapis.com/maps/api/staticmap";
    const TYPE_ROADMAP = "roadmap";
    const TYPE_SATELLITE = "satellite";
    const TYPE_TERRAIN = "terrain";
    const TYPE_HYBRIDE = "hybride";

    const FORMAT_PNG   = "png";
    const FORMAT_PNG8  = self::FORMAT_PNG;
    const FORMAT_PNG32 = "png32";
    const FORMAT_GIF   = "gif";
    const FORMAT_JPG   = "jpg";
    const FORMAT_JPG_BASELINE = "jpg-baseline";

    public function __construct($center, $size, $zoom)
    {
        $this->center = $center;
        $this->size = $size;
        $this->zoom = $zoom;
    }

    public function __toString()
    {
        $url_params = array("sensor=false", sprintf("center=%s", $this->center), sprintf("size=%s", $this->size), sprintf("zoom=%d", $this->zoom));

        if (!is_null($this->scale)) {
            $url_params[] = sprintf("scale=%d", $this->scale);
        }

        if (!is_null($this->format)) {
            $url_params[] = sprintf("format=%s", $this->format);
        }

        if (!is_null($this->maptype)) {
            $url_params[] = sprintf("maptype=%s", $this->maptype);
        }

        if (count($this->markers) != 0) {
            $url_params[] = join('&', $this->markers);
        }

        if (count($this->paths) != 0) {
            $url_params[] = join('&', $this->paths);
        }

        return sprintf("%s?%s", self::URL, join('&', $url_params));
    }
}
