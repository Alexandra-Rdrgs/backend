@extends('layouts.app')

@section('content')

    <a class="btn btn-primary" href="{{ action([App\Http\Controllers\admin\ArticleController::class,'create']) }}">Ajouter
        un article</a>
    <br><br><br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Banner</th>
            <th>Titre</th>
            <th>Catégorie</th>
            <th>Publié</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $art)
            <tr>
                <td><img class="img-fluid img-thumbnail" width="150"  src="{{ asset('banner/'.$art->banner) }}" alt=""></td>
                <td>{{ $art->title }}</td>
                <td>{{ $art->title_cat }}</td>
                @if($art->publish)
                    <td>Publié</td>
                @else
                    <td>non Publié</td>
                @endif
                <td>
                    <a href="{{ action([App\Http\Controllers\admin\ArticleController::class,'edit'],['id' => $art->id]) }}">Edit</a>
                    <a href="{{ action([App\Http\Controllers\admin\ArticleController::class,'destroy'],['id' => $art->id]) }}" onclick="return confirm('Voulez-vous vraiment supprimer {{ $art->title }}')" >Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
