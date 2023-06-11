<?php

namespace App\Http\Livewire\Category;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Category;

class Table extends DataTableComponent
{
    protected $model = Category::class;

    protected $listeners = [
        're_render_table' => '$refresh'
    ];

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable()->searchable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
            Column::make("Action", "id")
                ->format(
                    fn($value, $row, Column $column) => view('vendor.livewire-tables.custom.button-action')->withRow($row),
                ),
        ];
    }
}
