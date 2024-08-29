<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Citas;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Date;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Textarea;
use MoonShine\Fields\TinyMce;
use Sweet1s\MoonshineRBAC\Traits\WithRolePermissions;

/**
 * @extends ModelResource<Citas>
 */
class CitasResource extends ModelResource
{
    use WithRolePermissions;
    protected string $model = Citas::class;

    protected string $title = 'Citas';

    public function search(): array
    {
        return ['id', 'paciente', 'hora_fin'];
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                BelongsTo::make('Paciente', 'paciente', resource: new PacientesResource())->required(),
                Date::make('Fecha de Inicio', 'hora_inicio')->withTime()->required()->format('d.m.Y'),
                Date::make('Fecha de Fin', 'hora_fin')->withTime()->required(),
                TinyMce::make('Comentarios', 'comentarios')->locale('es_MX')->required(),
            ]),
        ];
    }

    public function indexFields(): array
    {
        return [
            BelongsTo::make('Paciente', 'paciente', resource: new PacientesResource())->required(),
            Date::make('Fecha de Inicio', 'hora_inicio')->withTime()->required()->format('d.m.Y'),
            Date::make('Fecha de Fin', 'hora_fin')->withTime()->required(),
            TinyMce::make('Comentarios', 'comentarios')->locale('es_MX')->required(),
        ];
    }
    public function detailFields(): array
    {
        return [
            Block::make([
                BelongsTo::make('Paciente', 'paciente', resource: new PacientesResource())->required(),
                Date::make('Fecha de Inicio', 'hora_inicio')->withTime()->required()->format('d.m.Y'),
                Date::make('Fecha de Fin', 'hora_fin')->withTime()->required(),
                TinyMce::make('Comentarios', 'comentarios')->locale('es_MX')->required(),
            ]),
        ];
    }

    /**
     * @param Citas $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
