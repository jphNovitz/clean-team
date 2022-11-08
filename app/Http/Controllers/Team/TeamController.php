<?php

namespace App\Http\Controllers\Team;

use App\Actions\Jetstream\UpdateTeamContactEmail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;

class TeamController extends Controller
{
  /**
     * Update the given team's name.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $teamId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateContactEmail(Request $request, $teamId)
    {
        $team = Jetstream::newTeamModel()->findOrFail($teamId);

        app(UpdateTeamContactEmail::class)->update($request->user(), $team, $request->all());

        return back(303);
    }
}
