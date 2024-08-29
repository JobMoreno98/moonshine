<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\Pacientes;
use MoonShine\Pages\Page;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Heading;
use MoonShine\Decorations\TextBlock;
use MoonShine\Fields\Text;
use MoonShine\Metrics\ValueMetric;
use MoonShine\Models\MoonshineUserRole;

class Prueba extends Page
{


    /**
     * @return array<string, string>
     */
    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function title(): string
    {
        return $this->title ?: 'Prueba';
    }

    /**
     * @return list<MoonShineComponent>
     */
    public function components(): array
    {
        $pacientes = Pacientes::count();
        return [
            Grid::make([
                Column::make([
                    Block::make('Pacientes', [
                        ValueMetric::make('Pacientes')->value($pacientes)
                    ])
                ])->columnSpan(4),
                Column::make([
                    Block::make([
                        Text::make('Title 2', 'Text 2')
                    ])
                ])->columnSpan(6),
            ])
        ];
    }
}
