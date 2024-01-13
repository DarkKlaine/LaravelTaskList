<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Список пользователей') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <table class="w-full text-md rounded mb-4">
                    <thead>
                    <tr class="border-b">
                        <th class="text-center p-3 px-5">Задача</th>
                        <th class="text-center p-3 px-5">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr class="border-b hover:bg-gray-100 text-center">
                            <td class="p-3 px-5">
                                <a href="{{ route('admin.lookUser', ['user' => $user->id]) }}">{{$user->name}}</a>
                            </td>
                            <td style="width: 30%" class="p-3 px-5">

                                <a href="{{ route('admin.lookUser', ['user' => $user->id]) }}"
                                   class="inline-block text-sm bg-indigo-500 text-white py-1 px-2 rounded">Посмотреть</a>
                                <form action="{{ route('admin.updateUser', ['user' => $user->id]) }}" class="inline-block" onsubmit="return confirm('Вы уверены, что хотите выполнить это действие?')">
                                    <button type="submit" name="delete" formmethod="POST"
                                            class="text-sm bg-red-500 text-white py-1 px-2 rounded">Удалить
                                    </button>
                                    {{ csrf_field() }}
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
