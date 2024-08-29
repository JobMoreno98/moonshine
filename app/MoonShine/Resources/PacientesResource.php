<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pacientes;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Date;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Fields\Markdown;
use Sweet1s\MoonshineRBAC\Traits\WithRolePermissions;

/**
 * @extends ModelResource<Pacientes>
 */
class PacientesResource extends ModelResource
{

    use WithRolePermissions;
    protected string $model = Pacientes::class;

    protected string $title = 'Pacientes';

    protected bool $createInModal = true;

    protected bool $editInModal = true;

    protected bool $detailInModal = false;

    public string $column = 'nombre';

    protected int $itemsPerPage = 10;

    protected bool $usePagination = true;


    public function search(): array
    {
        return ['id', 'nombre'];
    }


    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Nombre', 'nombre')->showOnExport()->required()->reactive(),
                Text::make('Teléfono', 'telefono')->showOnExport()->required(),
                Date::make('Fecha de Nacimiento', 'fecha_nacimiento')->format('d/m/Y')->showOnExport()->required(),
                Text::make('Domicilio', 'domicilio')->showOnExport()->required(),
                Markdown::make('Comentarios', 'comentarios')->showOnExport()->required()->default('-'),
                Slug::make('Slug')->from('nombre')->separator('_')->live()->readonly(),
            ]),
        ];
    }

    /**
     * @param Pacientes $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
