@extends('layouts.app')

@section('content')

    <a class="btn btn-primary" href="{{ action([App\Http\Controllers\admin\CategoryController::class,'create']) }}">Ajouter
        une cat</a>
    <br><br><br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Catégorie</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $cat)
            <tr>
                <td>{{ $cat->id }}</td>
                <td>{{ $cat->title_cat }}</td>
                <td>
                    <a href="{{ action([App\Http\Controllers\admin\CategoryController::class,'edit'],['id' => $cat->id]) }}">Edit</a>
                    <a href="{{ action([App\Http\Controllers\admin\CategoryController::class,'destroy'],['id' => $cat->id]) }}" onclick="return confirm('Voulez-vous vraiment supprimer {{ $cat->title_cat }}')" >Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
