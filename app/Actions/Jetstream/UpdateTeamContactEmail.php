<?php

namespace App\Actions\Jetstream;

use App\Contracts\UpdatesTeamContactEmail;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class UpdateTeamContactEmail implements UpdatesTeamContactEmail
{
    /**
     * Validate and update the given team's name.
     *
     * @param  mixed  $user
     * @param  mixed  $team
     * @param  array  $input
     * @return void
     */
    public function update($user, $team, array $input)
    {
        Gate::forUser($user)->authorize('update', $team);

        Validator::make($input, [
            'contact_email' => ['required', 'string', 'max:255'],
        ])->validateWithBag('updateTeamContactEmail');

        $team->forceFill([
            'contact_email' => $input['contact_email'],
        ])->save();
    }
}