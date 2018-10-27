<?php

namespace Basetheme;

/**
 * Changes the view used.
 * @return string
 */
add_filter('Basetheme\Views\locate', function(string $view): string
{
    return $view;
});

/**
 * Sets up variables to pass to the view.
 * @return array
 */
add_filter('Basetheme\Views\Init', function($post): array
{
    $common = [
        'masthead' => new Masthead($post),
    ];

    if (\is_page() || \is_single()) {
        return array_merge([
            'page' => Posts::current(),
            'allPosts' => Posts::allPosts()
        ], $common);
    }

    if (\is_archive()) {
        return array_merge([
            'articles' => Posts::archive()
        ], $common);
    }

    return [];
});