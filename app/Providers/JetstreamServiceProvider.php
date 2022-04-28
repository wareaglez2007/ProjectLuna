<?php

namespace App\Providers;

use App\Actions\Jetstream\AddTeamMember;
use App\Actions\Jetstream\CreateTeam;
use App\Actions\Jetstream\DeleteTeam;
use App\Actions\Jetstream\DeleteUser;
use App\Actions\Jetstream\InviteTeamMember;
use App\Actions\Jetstream\RemoveTeamMember;
use App\Actions\Jetstream\UpdateTeamName;
use App\Http\Livewire\CreateProjectForm;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;
use Livewire\Livewire;
use App\Http\Livewire\Profile\UpdateNotificationInformationForm;
use App\Http\Livewire\Frontend\NavigationMenu;
use App\Http\Livewire\NavigationMenuWithSideBar;
use App\Http\Livewire\UpdateProjectForm;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configurePermissions();

        Jetstream::createTeamsUsing(CreateTeam::class);
        Jetstream::updateTeamNamesUsing(UpdateTeamName::class);
        Jetstream::addTeamMembersUsing(AddTeamMember::class);
        Jetstream::inviteTeamMembersUsing(InviteTeamMember::class);
        Jetstream::removeTeamMembersUsing(RemoveTeamMember::class);
        Jetstream::deleteTeamsUsing(DeleteTeam::class);
        Jetstream::deleteUsersUsing(DeleteUser::class);
        /**
         * RS 04-17-2022
         * Register livewire components here
         * */
        Livewire::component('profile.update-notification-information-form', UpdateNotificationInformationForm::class);
        /**
         * 04-17-2022
         * Frontend Navigation menu
         */
        Livewire::component('frontend.navigation-menu', NavigationMenu::class);
        /**
         * 04-17-2022
         * Backend Navigation menu
         * Based on https://tailwindui.com/components/application-ui/application-shells/sidebar
         * option: Light sidebar with light header
         */
        Livewire::component('navigation-menu-with-side-bar', NavigationMenuWithSideBar::class);
        /**
         * 04-27-2022
         * Add components here ...
         */
        /**
         * Proejcts Sections <Keep clean>
         */
        Livewire::component('project.create-project-form', CreateProjectForm::class);
        Livewire::component('project.update-project-form', UpdateProjectForm::class);

    }

    /**
     * Configure the roles and permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::role('admin', 'Administrator', [
            'create',
            'read',
            'update',
            'delete',
        ])->description('Administrator users can perform any action.');

        Jetstream::role('editor', 'Editor', [
            'read',
            'create',
            'update',
        ])->description('Editor users have the ability to read, create, and update.');
    }
}
