<x-app-layout>
    <x-slot name="header">
        <h2 class="tw-font-semibold tw-text-xl tw-text-gray-800 tw-dark:tw-text-gray-200 tw-leading-tight">
            {{ __('Editar papel') }}
        </h2>
    </x-slot>

    <div class="tw-py-12">
        <div class="tw-max-w-7xl tw-mx-auto tw-sm:tw-px-6 tw-lg:tw-px-8">
            <div class="tw-bg-white tw-dark:tw-bg-gray-800 tw-overflow-hidden tw-shadow-sm tw-sm:tw-rounded-lg">
                <div class="tw-p-6 tw-text-gray-900 tw-dark:tw-text-gray-100">

                    <div class="container">
                        <h1>Papel do usuário</h1>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Emai</th>
                                    <th>Papel</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <form
                            action="{{route('roles.update', $user->id)}}"
                            method="post"
                        >
                            @method('PUT')
                            @csrf

                            <div class="mb-3">
                                <label for="papel" class="form-label">Selecione novo papel</label>
                                <select
                                    class="form-select"
                                    name="role"
                                    required
                                >
                                    <option
                                        value="admin"
                                        @selected($user->role === 'admin')
                                    >
                                        Administrador
                                    </option>
                                    <option
                                        value="bibliotecario"
                                        @selected($user->role === 'bibliotecario')
                                    >
                                        Bibliotecario
                                    </option>
                                    <option
                                        value="cliente"
                                        @selected($user->role === 'cliente')
                                    >
                                        Cliente
                                    </option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancelar</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
