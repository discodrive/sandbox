<?php

/**
 * Returns the last modified time of a given file in the child theme
 * @param string $filePath
 */
function lastModifiedTime(string $filePath): string
{

  $file = CHILDTHEME_PATH . $filePath;
  if (file_exists($file)) {
    return filemtime($file);
  }

  return '';

}

/**
 * Change image editor to prioritise GD over ImageMagick
 * @return array
 */
function gdImageEditor(array $editors): array
{
    $gd_editor = 'WP_Image_Editor_GD';
    $editors = array_diff($editors, array($gd_editor));
    array_unshift($editors, $gd_editor);
    return $editors;
}
add_filter('wp_image_editors', 'gdImageEditor');