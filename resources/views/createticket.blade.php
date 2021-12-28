<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Maintenance</title>
    <link rel="stylesheet" href="{{ mix('css/app.css')}}">
</head>
<body class="bg-gray-200 mb-8">
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg ">
            <form action="{{ route('createticket', $ressource ) }}" method="POST">
                @csrf
                    <div class="mb-4">
                        <label for="name" class="sr-only">Name</label>
                        <input type="text" name="name" id="name" placeholder="Name" 
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg  " value="{{ $ressource->name }}" disabled>
                    </div>
                    <div class="mb-4">
                        <label for="localisation" class="sr-only">Localisation</label>
                        <input type="text" name="localisation" id="localisation" placeholder="Localisation" 
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg  " value="{{ $ressource->localisation }}" disabled>
                    </div>
                    <div class="mb-4">
                        <label for="responsable" class="sr-only">Responsable</label>
                        <input type="text" name="responsable" id="responsable" placeholder="responsable" 
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg  " value="{{ $user->name }}" disabled>
                    </div>

                    <div class="mb-4">
                        <label for="anomalie" class="sr-only">Anomalie</label>
                        <select name="anomalie" id="anomalie" class="bg-gray-100 border-2 w-full p-2 rounded-lg">
                            @foreach ($anomalies as $anomalie)
                            <option value="{{ $anomalie->id }}">{{ $anomalie->name }}</option>
                            
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="sr-only">Description</label>
                        <input type="text" name="description" id="description" placeholder="Description" 
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg  " value="">
                    </div>
                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Submit anomalie</button>
                    </div>
            </form>


        </div>
    </div>
</body>
</html>