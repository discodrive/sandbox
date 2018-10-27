<?php

namespace Basetheme;

class Posts
extends \Basetheme\Query
{

    public static function archive()
    {
        return static::where()
            ->as('\Substrakt\Platypus\Post');
    }

    /**
     * Get all posts
     * @return object \Substrakt\Collection
     */
    public static function allPosts($params = []): \Substrakt\Collection
    {
        $params = array_merge([
            'paged'          => max(1, get_query_var('paged')),
            'post_type'      => 'post',
            'posts_per_page' => 3,
            'orderby'        => 'date',
            'order'          => 'DESC'
        ], $params);

        $hash  = md5(serialize($params));
        $query = new \WP_Query($params);

        if (!isset(static::$cache[$hash])) {
            static::$cache[$hash] = $query->posts;
        }

        return static::collect(static::$cache[$hash])->as('\Basetheme\News');
    }

}