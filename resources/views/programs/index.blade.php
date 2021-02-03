@extends('layouts.app')
@section('content')

    <a href="/programs/create" class="items-center px-8 py-2 mt-4 mb-4 mr-2 font-semibold text-blue-700 transition duration-500 ease-in-out transform bg-white border rounded-lg lg:inline-flex lg:mt-px hover:border-blue-800 hover:bg-blue-700 hover:text-white focus:ring focus:outline-none">Добавить ПО</a>

    <div class="w-full shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Название
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Удалить</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($programs as $program)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $program->title }}
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="/programs/delete/{{ $program->id }}" class="text-indigo-600 hover:text-indigo-900">Удалить</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection