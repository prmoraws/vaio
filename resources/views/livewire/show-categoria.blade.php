@section('title', 'Categorias')

<x-slot name="header">
    <h2 class="capitalize font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ Request::path() }}
    </h2>
</x-slot>

<div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        <form method="POST" wire:submit.prevent='create'>
            <div class="block mt-1 w-full">
                <x-label for="nome" value="{{ __('Nova Categoria') }}" />
                <x-input name="nome" id="nome" type="text" class="mt-1 block w-full" wire:model="nome" />
                <x-input-error for="nome" class="mt-2" />
            </div>
            <div class="block mt-1 w-full">
                <x-label for="descricao" value="{{ __('Descrição') }}" />
                <x-textarea name="descricao" id="descricao" type="text" class="mt-1 block w-full"
                    wire:model="descricao" />
                <x-input-error for="descricao" class="mt-2" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-button class="ms-4">
                    {{ __('Registrar categoria') }}
                </x-button>
            </div>
        </form>

        <hr>
        <table class="table-auto">
            <thead>
                <tr>
                    <th>Categoria</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            @foreach ($categorias as $categoria)
                <tbody>
                    <tr>

                        <td>{{ $categoria->nome }}</td>
                        <td>{{ $categoria->descricao }}</td>

                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
</div>
