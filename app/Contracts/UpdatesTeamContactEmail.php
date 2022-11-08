<?php

namespace App\Contracts;

interface UpdatesTeamContactEmail
{
    /**
     * Validate and update the given team's contact email.
     *
     * @param  mixed  $user
     * @param  mixed  $team
     * @param  array  $input
     * @return void
     */
    public function update($user, $team, array $input);
}