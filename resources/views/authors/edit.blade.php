<x-app-layout>
    <x-slot name="header">
        <h2 class="tw-font-semibold tw-text-xl tw-text-gray-800 tw-dark:text-gray-200 tw-leading-tight">
            {{ __('Edit Author') }}
        </h2>
    </x-slot>

    <div class="tw-py-12">
        <div class="tw-max-w-7xl tw-mx-auto tw-sm:px-6 tw-lg:px-8">
            <div class="tw-bg-white tw-dark:bg-gray-800 tw-overflow-hidden tw-shadow-sm tw-sm:rounded-lg">
                <div class="tw-p-6 tw-text-gray-900 tw-dark:text-gray-100">

                    <div class="container">
                        <h1>Editar Autor</h1>
                        <form action="{{ route('authors.update', $author->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $author->name) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="birth_date" class="form-label">Data de Nascimento</label>
                                <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date', $author->birth_date) }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                            <a href="{{ route('authors.index') }}" class="btn btn-secondary">Cancelar</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
