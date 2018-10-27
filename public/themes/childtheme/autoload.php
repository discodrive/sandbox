<?php

namespace Basetheme;

/**
 * Adds custom directories to the basetheme directory autoloader.
 * @param  array $dirs The existing list of directories.
 * @return array
 * @codeCoverageIgnore
 */
function autoloadDirectories(array $dirs): array
{
    $dirs[] = CHILDTHEME_PATH . 'attendable/';
    $dirs[] = CHILDTHEME_PATH . 'construkt/';
    return $dirs;
}
//add_filter('Basetheme\AutoInclude\Dirs', '\Basetheme\autoloadDirectories');