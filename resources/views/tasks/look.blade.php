<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Просмотр задачи - ') }} {{$task->name}}
            <a href="/task/edit/{{$task->id}}" name="edit" class="inline-block text-sm bg-indigo-500 hover:bg-indigo-500 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Изменить</a>
            <a href="/dashboard" name="edit" class="inline-block text-sm bg-indigo-500 hover:bg-indigo-500 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Назад</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">

                <table class="w-full text-md rounded mb-4">
                    <thead>
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">Описание</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="p-3 px-5">
                                <pre style="white-space: pre-wrap; margin: 10px">{{$task->description}}</pre>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
