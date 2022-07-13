<?php

namespace App\Traits;

use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

trait HasProjects
{
    /**
     * Determine if the given project is the current project.
     *
     * @param  mixed  $project
     * @return bool
     */
    public function isCurrentProject($project)
    {
        return $project->id === $this->currentProject->id;
    }

    /**
     * Get the current team of the user's context.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currentProject()
    {

        return $this->belongsTo(Project::class, 'user_id');
    }



    /**
     * Get all of the teams the user owns or belongs to.
     *
     * @return \Illuminate\Support\Collection
     */
    public function allProjects()
    {
        return $this->ownedProjects->merge($this->projects)->sortBy('name');
    }

    /**
     * Get all of the teams the user owns.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ownedProjects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * Get all of the project the user belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects()
    {
        return $this->belongsToMany(User::class, Project::class)
                        ->withTimestamps()
                        ->as('project_ownership');
    }

    // /**
    //  * Get the user's "personal" team.
    //  *
    //  * @return \App\Models\Team
    //  */
    // public function personalTeam()
    // {
    //     return $this->ownedTeams->where('personal_team', true)->first();
    // }

    /**
     * Determine if the user owns the given team.
     *
     * @param  mixed  $team
     * @return bool
     */
    public function ownsProject($project)
    {
        if (is_null($project)) {
            return false;
        }

        return $this->id == $project->{$this->getForeignKey()};
    }

    /**
     * Determine if the user belongs to the given project.
     *
     * @param  mixed  $team
     * @return bool
     */
    public function belongsToProject($project)
    {
        if (is_null($project)) {
            return false;
        }
       // dd($this->projects());
        return $this->ownsProject($project) || $this->projects->contains(function ($t) use ($project) {
            return $t->id === $project->id;
        });
    }

    /**
    //  * Get the role that the user has on the team.
    //  *
    //  * @param  mixed  $team
    //  * @return \Laravel\Jetstream\Role|null
    //  */
    // public function teamRole($team)
    // {
    //     if ($this->ownsTeam($team)) {
    //         return new OwnerRole;
    //     }

    //     if (! $this->belongsToTeam($team)) {
    //         return;
    //     }

    //     $role = $team->users
    //         ->where('id', $this->id)
    //         ->first()
    //         ->membership
    //         ->role;

    //     return $role ? Jetstream::findRole($role) : null;
    // }

    // /**
    //  * Determine if the user has the given role on the given team.
    //  *
    //  * @param  mixed  $team
    //  * @param  string  $role
    //  * @return bool
    //  */
    // public function hasTeamRole($team, string $role)
    // {
    //     if ($this->ownsTeam($team)) {
    //         return true;
    //     }

    //     return $this->belongsToTeam($team) && optional(Jetstream::findRole($team->users->where(
    //         'id', $this->id
    //     )->first()->membership->role))->key === $role;
    // }

    // /**
    //  * Get the user's permissions for the given team.
    //  *
    //  * @param  mixed  $team
    //  * @return array
    //  */
    // public function teamPermissions($team)
    // {
    //     if ($this->ownsTeam($team)) {
    //         return ['*'];
    //     }

    //     if (! $this->belongsToTeam($team)) {
    //         return [];
    //     }

    //     return (array) optional($this->teamRole($team))->permissions;
    // }

    // /**
    //  * Determine if the user has the given permission on the given team.
    //  *
    //  * @param  mixed  $team
    //  * @param  string  $permission
    //  * @return bool
    //  */
    // public function hasTeamPermission($team, string $permission)
    // {
    //     if ($this->ownsTeam($team)) {
    //         return true;
    //     }

    //     if (! $this->belongsToTeam($team)) {
    //         return false;
    //     }

    //     if (in_array(HasApiTokens::class, class_uses_recursive($this)) &&
    //         ! $this->tokenCan($permission) &&
    //         $this->currentAccessToken() !== null) {
    //         return false;
    //     }

    //     $permissions = $this->teamPermissions($team);

    //     return in_array($permission, $permissions) ||
    //            in_array('*', $permissions) ||
    //            (Str::endsWith($permission, ':create') && in_array('*:create', $permissions)) ||
    //            (Str::endsWith($permission, ':update') && in_array('*:update', $permissions));
    // }
}
