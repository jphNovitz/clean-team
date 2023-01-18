<?php

namespace App\Http\Controllers;

use App\Models\MissingProducts;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Laravel\Jetstream\Jetstream;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard', [
            'missingProducts' => count(MissingProducts::with('product')
            ->where('team_id', auth()->user()->currentTeam->id)
            ->where('reported', false)->get())
            ]);
    }
}
