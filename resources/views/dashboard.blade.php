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
                                            Ressource
                                        </th>
                                        <th class="px-6 py-2 text-xs text-gray-500">
                                            Localisation
                                        </th>
                                        <th class="px-6 py-2 text-xs text-gray-500">
                                            Anomalie
                                        </th>
                                        <th class="px-6 py-2 text-xs text-gray-500">
                                            Description
                                        </th>
                                        <th class="px-6 py-2 text-xs text-gray-500">
                                            Delete
                                        </th>

                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    @foreach ($tickets as $ticket)
                                    <tr class="whitespace-nowrap">
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{ $ticket->id }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{ $ticket->ressourceName  }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{ $ticket->localisation  }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{ $ticket->anomalieName  }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{ $ticket->description  }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('listusers')}} " 
                                            onclick="event.preventDefault();
                                             document.getElementById(
                                               'delete-form-{{$ticket->id}}').submit();" class="px-4 py-1 text-sm text-white bg-green-400 rounded">Close</a>
                                        </td>
                                        <form id="delete-form-{{$ticket->id}}" 
                                            + action="{{route('dashboard.destroy', $ticket->id)}}"
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