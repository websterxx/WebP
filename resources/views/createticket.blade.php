@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <form action="" method="POST">
            <div class="mb-4">
                <select name="pets" id="pets">
                    <option value="{{ \Request::get('pets') }}"></option>
                </select>
            </div>
        </form>
        </div>
    </div>
@endsection 