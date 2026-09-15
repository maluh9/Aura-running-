<?php

namespace App\Http\Controllers;

use App\Models\NationalTeam;
use Illuminate\View\View;

class NationalTeamController extends Controller
{
    public function show(string $slug): View
    {
        $team = NationalTeam::where(
            'slug',
            $slug
        )
            ->where('active', true)
            ->with([
                'products' => function ($query) {

                    $query
                        ->where('active', true)
                        ->whereHas(
                            'category',
                            function ($category) {

                                $category->where(
                                    'active',
                                    true
                                );

                            }
                        );

                }
            ])
            ->firstOrFail();


        return view(
            'world-cup.show',
            compact('team')
        );
    }
}