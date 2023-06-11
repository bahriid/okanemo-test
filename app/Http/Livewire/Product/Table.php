<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use App\Utilities\Helpers;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;

class Table extends DataTableComponent
{
    protected $listeners = [
        're_render_table' => '$refresh'
    ];

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setEagerLoadAllRelationsEnabled();
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable()->searchable(),
            Column::make("Price", "price")
                ->format(
                    fn($value, $row, Column $column) => Helpers::formatCurrency($row->price)
                )
                ->sortable()->searchable(),
            Column::make("Category", "category.name")
                ->sortable()->searchable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Action", "id")
                ->format(
                    fn($value, $row, Column $column) => view('vendor.livewire-tables.custom.button-action')->withRow($row),
                ),
        ];
    }

    public function builder(): Builder
    {
        $query =  Product::with('category');
        return $query->select('products.*');
    }
}
