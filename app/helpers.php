<?php

/**
 * Theme helpers.
 */

namespace App;

use App\Init;

/**
 * Calling my development code
 */
if( class_exists( 'App\\Init' ) ) {
    Init::registerServices();
}