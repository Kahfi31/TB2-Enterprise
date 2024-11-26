<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyCsrfToken extends Middleware
{
    protected $except = [
        // Tambahkan URL yang tidak perlu validasi CSRF
    ];
}
