GOOGLE™ STATIC MAP API PHP LIBRARY
==================================

This library eases the creation of static maps by generating the URLs for Google's api.

    <?php

    use Knp\Google\StaticMapApi as Api;

    $map = new Api\Map('nantes', '512x512', 8);

    ?>

    <img src="<?php echo $map ?> />

Using Points and markers
------------------------

Point type can handle latitude and longitude. They may be used to center maps or to create paths and markers. 

    $map = new Api\Map(new Api\Point(47.93845, -3.254653), '512x512', 8);

Markers are created using a *MarkerCollection* instance. Each instance can manage several markers with the same configuration (color, size, label etc.)

    $collection = new Api\MarkerCollection();
    $collection->color = 'red';
    $collection->label = '1';
    $collection->size  = Api\MarkerCollection::SIZE_SMALL;
    $collection->shadow = false;
    $collection->markers = array('Paris', new Api\Point(47.93845, -3.254653));

    $map->markers[] = $collection;

Colors
------

Of course, Google API understands basic colors names like 'blue', 'yellow' etc. but it is possible to pass *0x0f0f0f* form colors. A *Color* class provides a handy way to manage the hexadecimal translation:

    $color = new Api\Color(127, 128, 129);

    echo $color; // 0x798081

Paths
-----

Map can display paths based on the order of the given points.

    $path = new Api\Path;
    $path->color = new Api\Color(0, 56, 200);
    $path->weght = 10;
    $path->points = array(new Api\Point(47.93845, -3.254653), 'nantes', 'rue de strasbourg');

    $map->paths[] = $path;

