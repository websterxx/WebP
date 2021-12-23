@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-lg">
            <div class="container flex justify-center mx-auto">
                <div class="flex flex-col">
                    <div class="w-full">
                        <div class="border-b border-gray-200 shadow">
                            <table>
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-2 text-xs text-gray-500">
                                            ID
                                        </th>
                                        <th class="px-6 py-2 text-xs text-gray-500">
                                            Name
                                        </th>
                                        <th class="px-6 py-2 text-xs text-gray-500">
                                            Localisation
                                        </th>
                                        <th class="px-6 py-2 text-xs text-gray-500">
                                            Edit
                                        </th>
                                        <th class="px-6 py-2 text-xs text-gray-500">
                                            Delete
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    <tr class="whitespace-nowrap">
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            1
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                LightBulb
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                U2.2.24
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="#" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit</a>
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="#" class="px-4 py-1 text-sm text-white bg-red-400 rounded">Delete</a>
                                        </td>
                                    </tr>
                                    <tr class="whitespace-nowrap">
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            2
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                KeyBoard
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                U2.2.24
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="#" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit</a>
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="#" class="px-4 py-1 text-sm text-white bg-red-400 rounded">Delete</a>
                                        </td>
                                    </tr>
                                    <tr class="whitespace-nowrap">
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            3
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                Screen
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                U2.2.24
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="#" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit</a>
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="#" class="px-4 py-1 text-sm text-white bg-red-400 rounded">Delete</a>
                                        </td>
                                    </tr>
            
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 