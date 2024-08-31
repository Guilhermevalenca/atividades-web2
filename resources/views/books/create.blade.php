<x-app-layout>
    <x-slot name="header">
        <h2 class="tw-font-semibold tw-text-xl tw-text-gray-800 tw-dark:text-gray-200 tw-leading-tight">
            {{ __('Create Book') }}
        </h2>
    </x-slot>

    <div class="tw-py-12">
        <div class="tw-max-w-7xl tw-mx-auto tw-sm:px-6 tw-lg:px-8">
            <div class="tw-bg-white tw-dark:bg-gray-800 tw-overflow-hidden tw-shadow-sm tw-sm:rounded-lg">
                <div class="tw-p-6 tw-text-gray-900 tw-dark:text-gray-100">

                    <div class="container">
                        <h1>Adicionar Novo Livro</h1>
                        <form action="{{ route('books.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Título</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="author_id" class="form-label">Autor</label>
                                <select class="form-select" id="author_id" name="author_id" required>
                                    <option value="">Selecione um Autor</option>
                                    @foreach ($authors as $author)
                                        <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>
                                            {{ $author->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="publisher_id" class="form-label">Editora</label>
                                <select class="form-select" id="publisher_id" name="publisher_id" required>
                                    <option value="">Selecione uma Editora</option>
                                    @foreach ($publishers as $publisher)
                                        <option value="{{ $publisher->id }}" {{ old('publisher_id') == $publisher->id ? 'selected' : '' }}>
                                            {{ $publisher->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="published_year" class="form-label">Ano de Publicação</label>
                                <input type="number" class="form-control" id="published_year" name="published_year" value="{{ old('published_year') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="categories" class="form-label">Categorias</label>
                                <select class="form-select" id="categories" name="categories[]" multiple required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ in_array($category->id, old('categories', [])) ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancelar</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
