<?php

namespace App\Http\Middleware;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ShareProductsData
{
    public function handle($request, $next)
    {
        Inertia::share([
            'initialProducts' => Product::all(),
        ]);

        return $next($request);
    }
}
