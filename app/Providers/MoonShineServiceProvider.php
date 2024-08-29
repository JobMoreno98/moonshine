<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Pages\citasPacientes;
use App\MoonShine\Pages\Prueba;
use App\MoonShine\Resources\CitasResource;
use App\MoonShine\Resources\PacientesResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;
use MoonShine\Contracts\Resources\ResourceContract;
use MoonShine\Menu\MenuElement;
use MoonShine\Pages\Page;
use Closure;
use Sweet1s\MoonshineRBAC\Components\MenuRBAC;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    /**
     * @return list<ResourceContract>
     */
    protected function resources(): array
    {
        return [];
    }

    /**
     * @return list<Page>
     */
    public function pages(): array
    {
        return [];
    }
    /**
     * @return Closure|list<MenuElement>
     */
    protected function menu(): array
    {
        return
            MenuRBAC::menu(
                MenuGroup::make('System', [
                    MenuItem::make('Users', new \Sweet1s\MoonshineRBAC\Resource\UserResource(), 'heroicons.outline.users'),
                    MenuItem::make('Roles', new \Sweet1s\MoonshineRBAC\Resource\RoleResource(), 'heroicons.outline.shield-exclamation'),
                    MenuItem::make('Permissions', new \Sweet1s\MoonshineRBAC\Resource\PermissionResource(), 'heroicons.outline.shield-exclamation'),
                ], 'heroicons.outline.user-group'),
                MenuItem::make('Pacientes', new PacientesResource())->icon('heroicons.outline.users') ,
                MenuItem::make('Citas', new CitasResource())->icon('heroicons.outline.calendar'), 


                MenuItem::make('Custom Page', Prueba::make('Custom page')),
            );
    }

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }

    public function boot(): void
    {
        parent::boot();
    }
}
