<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Просмотр пользователя - ') }} {{$user->name}}
            <a href="{{ route('admin') }}"
               class="inline-block text-sm bg-indigo-500 text-white py-1 px-2 rounded">Назад</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <form method="POST" action="{{ route('admin.updateUser', ['user' => $user->id]) }}">
                    <table class="w-full text-md rounded mb-4">
                        <thead>
                        <tr class="border-b">
                            <th class="text-right p-3 px-5">
                                {{--                            <a href="{{ route('admin.editUser', ['user' => $user->id]) }}" class="inline-block text-sm bg-indigo-500 hover:bg-indigo-500 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Изменить</a>--}}
                                {{--                            <form action="{{ route('admin.updateUser', ['user' => $user->id]) }}" class="inline-block" onsubmit="return confirm('Вы уверены, что хотите выполнить это действие?')">--}}
                                {{--                                <button type="submit" name="delete" formmethod="POST" class="text-sm bg-red-500 text-white py-1 px-2 rounded">Удалить</button>--}}
                                {{--                                {{ csrf_field() }}--}}
                                {{--                            </form>--}}
                                {{--                            <a href="{{ route('admin') }}" class="inline-block text-sm bg-indigo-500 text-white py-1 px-2 rounded">Назад</a>--}}
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="border-b">
                            <td class="p-3 px-5" style="text-align: right">
                                Имя пользователя:
                            </td>
                            <td style="width: 60%" class="p-3 px-5">
                                <input id="submit" name="name" style="width: 300px;"
                                       class="inline-block bg-gray-100 rounded border border-gray-400  resize-none h-7 py-1 px-2 font-medium placeholder-gray-700"
                                       value='{{$user->name}}'>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-3 px-5" style="text-align: right">
                                Роли:
                            </td>
                            <td class="p-3 px-5">
                                <input type="checkbox" name="roles[]" class="bg-gray-100 rounded border border-gray-400" value="user" @if ($user->hasRole('user')) checked @endif>
                                <label for="roles[]">User</label>

                                <input type="checkbox" name="roles[]" class="bg-gray-100 rounded border border-gray-400" value="admin" @if ($user->hasRole('admin')) checked @endif>
                                <label for="roles[]">Admin</label>
                            </td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-3 px-5" style="text-align: right">
                                E-mail:
                            </td>
                            <td style="width: 60%" class="p-3 px-5">
                                <input id="submit" name="email" style="width: 300px;"
                                       class="inline-block bg-gray-100 rounded border border-gray-400  resize-none h-7 py-1 px-2 font-medium placeholder-gray-700"
                                       value='{{$user->email}}'>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-3 px-5" style="text-align: right">
                                Создан:
                            </td>
                            <td class="p-3 px-5">
                                {{$user->created_at}}
                            </td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-3 px-5" style="text-align: right">
                                Изменить пароль:
                            </td>
                            <td style="width: 60%" class="p-3 px-5">
                                <input type="password" name="password" style="width: 300px;"
                                       class="inline-block bg-gray-100 rounded border border-gray-400 resize-none h-7 py-1 px-2 font-medium" placeholder="Введите пароль"><br>
                                <input type="password" name="password_confirmation" style="width: 300px; margin-top: 5px"
                                       class="inline-block bg-gray-100 rounded border border-gray-400 resize-none h-7 py-1 px-2 font-medium" placeholder="Подтвердите пароль">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-3 px-5">

                            </td>
                            <td class="p-3 px-5">
                                <div style="text-align: right; width: 305px;">
                                    <button style=" margin: 5px;" type="submit"
                                            class="inline-block text-sm bg-indigo-500 hover:bg-indigo-500 text-white h-7 py-1 px-2 rounded">
                                        Сохранить
                                    </button>
                                    <a href="{{ route('admin') }}"
                                       class="inline-block text-sm bg-indigo-500 text-white py-1 px-2 rounded">Назад</a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
