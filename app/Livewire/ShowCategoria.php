<?php

namespace App\Livewire;

use App\Models\Categoria;
use Livewire\Component;

class ShowCategoria extends Component
{

    public $descricao, $nome;

    protected $rules = [
        'nome' => 'required|min:3|max:255',
        'descricao' => 'required|min:3|max:500'
    ];


    public function render()
    {
        $categorias = Categoria::get();

        return view('livewire.show-categoria', [
            'categorias' => $categorias,
        ]);
    }

    public function create()
    {
        $this->validate();

        Categoria::create([

            'nome' => $this->nome,
            'descricao' => $this->descricao
        ]);
        redirect()->route('categorias');
    }
}
