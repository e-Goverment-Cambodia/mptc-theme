<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'site_name' => $this->siteName( 'name' ),
            'site_description' => $this->siteName( 'description' )
        ];
    }

    /**
     * Returns the site name.
     *
     * @return string
     */
    public function siteName( string $show )
    {
        return get_bloginfo( $show, 'display' );
    }
}
