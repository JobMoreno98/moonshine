<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Email;
use MoonShine\Fields\Text;
use Sweet1s\MoonshineRBAC\Traits\WithRoleFormComponent;
use Sweet1s\MoonshineRBAC\Traits\WithRolePermissions;
use MoonShine\Fields\Image;
use MoonShine\TwoFactor\ComponentSets\TwoFactor;

/**
 * @extends ModelResource<User>
 */
class UserResource extends ModelResource
{
    use WithRolePermissions;
    use WithRoleFormComponent;


    protected string $model = User::class;

    protected string $title = 'users';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable()->isHidden(),
                Text::make('name'),
                Email::make('email'),
                Image::make('avatar'),
            ]),
        ];
    }

    /**
     * @param User $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
    protected function components(): array
    {
        return [
            // ...

            TwoFactor::make(),
        ];
    }
}
