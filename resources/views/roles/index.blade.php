<x-app-layout>
    <x-slot name="header">
        <h2 class="tw-font-semibold tw-text-xl tw-text-gray-800 tw-dark:tw-text-gray-200 tw-leading-tight">
            {{ __('Papeis') }}
        </h2>
    </x-slot>

    <div class="tw-py-12">
        <div class="tw-max-w-7xl tw-mx-auto tw-sm:tw-px-6 tw-lg:tw-px-8">
            <div class="tw-bg-white tw-dark:tw-bg-gray-800 tw-overflow-hidden tw-shadow-sm tw-sm:tw-rounded-lg">
                <div class="tw-p-6 tw-text-gray-900 tw-dark:tw-text-gray-100">
                    <div class="container">
                        <h1>Lista de usuários</h1>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>roles</th>
                                    <th>actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        <a href="{{ route('roles.edit', $user->id) }}" class="btn btn-warning">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
