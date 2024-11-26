<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PreventRequestsDuringMaintenance extends Middleware
{
    protected $except = [
        // Daftar URL yang diizinkan selama mode maintenance
    ];
}
