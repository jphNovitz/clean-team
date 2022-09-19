<?php

namespace App\Http\Middleware;

use App\Models\Product;
use Inertia\Inertia;

class ShareProductsData
{
    public function handle($request, $next)
    {
        Inertia::share([
            'products' => Product::all(),
        ]);

        return $next($request);
    }
}