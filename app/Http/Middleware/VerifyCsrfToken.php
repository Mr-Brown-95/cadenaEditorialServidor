<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/branchesServidor',
        '/branchesServidor/*',
        '/employsServidor',
        '/employsServidor/*',
        '/journalistsServidor',
        '/journalistsServidor/*',
        '/magazinesServidor',
        '/magazinesServidor/*',
        '/branche_magazinesServidor',
        '/branche_magazinesServidor/*',
        '/copiesServidor',
        '/copiesServidor/*',
        '/sectionsServidor',
        '/sectionsServidor/*',
        '/journalist_magazinesServidor',
        '/journalist_magazinesServidor/*'


    ];
}
