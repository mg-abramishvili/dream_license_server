@extends('layouts.app')
@section('content')

    <a href="/keys/create" class="items-center px-8 py-2 mt-4 mb-4 mr-2 font-semibold text-blue-700 transition duration-500 ease-in-out transform bg-white border rounded-lg lg:inline-flex lg:mt-px hover:border-blue-800 hover:bg-blue-700 hover:text-white focus:ring focus:outline-none">Добавить ключ</a>

    <div class="w-full shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Ключ
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        ПО
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Статус
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Комментарий
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Удалить</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($keys as $key)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $key->key }}
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="text-sm font-medium text-gray-900">
                                @foreach($key->programs as $program)
                                    {{ $program->title }}
                                @endforeach
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $key->status }}
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $key->comment }}
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="/keys/delete/{{ $key->id }}" class="text-indigo-600 hover:text-indigo-900">Удалить</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection