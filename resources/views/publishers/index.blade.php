<x-app-layout>
    <x-slot name="header">
        <h2 class="tw-font-semibold tw-text-xl tw-text-gray-800 tw-dark:text-gray-200 tw-leading-tight">
            {{ __('Publishers') }}
        </h2>
    </x-slot>

    <div class="tw-py-12">
        <div class="tw-max-w-7xl tw-mx-auto tw-sm:px-6 tw-lg:px-8">
            <div class="tw-bg-white tw-dark:bg-gray-800 tw-overflow-hidden tw-shadow-sm tw-sm:rounded-lg">
                <div class="tw-p-6 tw-text-gray-900 tw-dark:text-gray-100">

                    <div class="container">
                        <h1>Lista de Editoras</h1>
                        @if(auth()->user()->role !== 'cliente')
                            <a href="{{ route('publishers.create') }}" class="btn btn-primary mb-3">Adicionar Nova Editora</a>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Endereço</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($publishers as $publisher)
                                <tr>
                                    <td>{{ $publisher->name }}</td>
                                    <td>{{ $publisher->address }}</td>
                                        <td>
                                            <a href="{{ route('publishers.show', $publisher->id) }}" class="btn btn-info">Ver</a>
                                            @if(auth()->user()->role !== 'cliente')
                                                <a href="{{ route('publishers.edit', $publisher->id) }}" class="btn btn-warning">Editar</a>
                                                <form action="{{ route('publishers.destroy', $publisher->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta editora?')">Excluir</button>
                                                </form>
                                            @endif
                                        </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
