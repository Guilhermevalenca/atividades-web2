@php
    use \Illuminate\Support\Facades\Storage;
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="tw-font-semibold tw-text-xl tw-text-gray-800 tw-dark:text-gray-200 tw-leading-tight">
            {{ __('Show book') }}
        </h2>
    </x-slot>

    <div class="tw-py-12">
        <div class="tw-max-w-7xl tw-mx-auto tw-sm:px-6 tw-lg:px-8">
            <div class="tw-bg-white tw-dark:bg-gray-800 tw-overflow-hidden tw-shadow-sm tw-sm:rounded-lg">
                <div class="tw-p-6 tw-text-gray-900 tw-dark:text-gray-100">

                    <div class="container">
                        <img src="{{ Storage::url($book->cover)  }}" alt="imagem do livro">
                        <h1>{{ $book->title }}</h1>
                        <p><strong>Autor:</strong> {{ $book->author->name }}</p>
                        <p><strong>Editora:</strong> {{ $book->publisher->name }}</p>
                        <p><strong>Ano de Publicação:</strong> {{ $book->published_year }}</p>
                        <p><strong>Categorias:</strong>
                            @foreach ($book->categories as $category)
                                <span class="badge bg-secondary">{{ $category->name }}</span>
                            @endforeach
                        </p>
                        <a href="{{ route('books.index') }}" class="btn btn-primary">Voltar à Lista</a>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este livro?')">Excluir</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
