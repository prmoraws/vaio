<?php

namespace App\Livewire;

use App\Models\Categoria;
use Livewire\Component;

class ShowCategoria extends Component
{

    public $descricao, $nome;

    public function render()
    {
        $categorias = Categoria::get();

        return view('livewire.show-categoria', [
            'categorias' => $categorias,
        ]);
    }

    public function create()
    {

        Categoria::create([

            'nome' => $this->nome,
            'descricao' => $this->descricao

        ]);

        $this->nome = '';
        $this->descricao = '';
    }
}
