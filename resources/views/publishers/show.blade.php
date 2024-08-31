<x-app-layout>
    <x-slot name="header">
        <h2 class="tw-font-semibold tw-text-xl tw-text-gray-800 tw-dark:text-gray-200 tw-leading-tight">
            {{ __('Show publisher') }}
        </h2>
    </x-slot>

    <div class="tw-py-12">
        <div class="tw-max-w-7xl tw-mx-auto tw-sm:px-6 tw-lg:px-8">
            <div class="tw-bg-white tw-dark:bg-gray-800 tw-overflow-hidden tw-shadow-sm tw-sm:rounded-lg">
                <div class="tw-p-6 tw-text-gray-900 tw-dark:text-gray-100">

                    <div class="container">
                        <h1>{{ $publisher->name }}</h1>
                        <p><strong>Endereço:</strong> {{ $publisher->address }}</p>
                        <h3>Livros Publicados:</h3>
                        <ul>
                            @foreach ($publisher->books as $book)
                                <li>{{ $book->title }}</li>
                            @endforeach
                        </ul>
                        <a href="{{ route('publishers.index') }}" class="btn btn-primary">Voltar à Lista</a>
                        <a href="{{ route('publishers.edit', $publisher->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('publishers.destroy', $publisher->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta editora?')">Excluir</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
