<?php

namespace App\Livewire;

use App\Models\Categoria;
use Illuminate\Support\Facades\DB;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Action;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\WireLinkColumn;

class CategoriaTable extends DataTableComponent
{
    protected $model = Categoria::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }


    public function delete($id)
    {
        DB::table('categorias')
            ->where('id', $id)
            ->delete();
        return redirect()->back();
    }
    public function actions(): array
    {
        return [
            Action::make('modal')
                ->setWireAction("wire:click")
                ->setWireActionDispatchParams("'openModal', { component: 'edit-categoria' }"),
        ];
    }

    public function columns(): array
    {

        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nome", "nome")
                ->sortable(),
            Column::make("Descricao", "descricao")
                ->sortable(),
            WireLinkColumn::make("APAGAR")
                ->title(fn($row) => 'Excluir')
                ->confirmMessage('Tem certeza de que deseja excluir este item?')
                ->action(fn($row) => 'delete("' . $row->id . '")'),

            // <button wire:click="$dispatch('openModal', { component: 'edit-categoria' })">Edit User</button>



        ];
    }
}
