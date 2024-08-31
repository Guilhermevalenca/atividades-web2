<x-app-layout>
    <x-slot name="header">
        <h2 class="tw-font-semibold tw-text-xl tw-text-gray-800 tw-dark:text-gray-200 tw-leading-tight">
            {{ __('Show Category') }}
        </h2>
    </x-slot>

    <div class="tw-py-12">
        <div class="tw-max-w-7xl tw-mx-auto tw-sm:px-6 tw-lg:px-8">
            <div class="tw-bg-white tw-dark:bg-gray-800 tw-overflow-hidden tw-shadow-sm tw-sm:rounded-lg">
                <div class="tw-p-6 tw-text-gray-900 tw-dark:text-gray-100">

                    <div class="container">
                        <h1>{{ $category->name }}</h1>
                        <h3>Livros nesta Categoria:</h3>
                        <ul>
                            @foreach ($category->books as $book)
                                <li>{{ $book->title }}</li>
                            @endforeach
                        </ul>
                        <a href="{{ route('categories.index') }}" class="btn btn-primary">Voltar à Lista</a>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta categoria?')">Excluir</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
