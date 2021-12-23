@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-lg">
            <div class="container flex justify-center mx-auto">
                <div class="flex flex-col">
                    <div class="w-full">
                        <div class="border-b border-gray-200 shadow ">
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
                                            Email
                                        </th>
                                        <th class="px-6 py-2 text-xs text-gray-500">
                                            Username
                                        </th>
                                        <th class="px-6 py-2 text-xs text-gray-500">
                                            Delete
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    @foreach ($users as $user)
                                    <tr class="whitespace-nowrap">
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{ $user->id }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{ $user->name }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{ $user->email }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{ $user->username }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('listusers')}} " 
                                            onclick="event.preventDefault();
                                             document.getElementById(
                                               'delete-form-{{$user->id}}').submit();" class="px-4 py-1 text-sm text-white bg-red-400 rounded">Delete</a>
                                        </td>
                                        <form id="delete-form-{{$user->id}}" 
                                            + action="{{route('users.destroy', $user->id)}}"
                                            method="post">
                                          @csrf 
                                          @method('DELETE')
                                      </form>
                                    </tr>
                                    @endforeach

                                    
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        
    </div>

    


@endsection 