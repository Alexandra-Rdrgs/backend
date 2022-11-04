@extends('layouts.app')

@section('content')
    <a class="btn btn-primary"
       href="{{ action([App\Http\Controllers\admin\ArticleController::class,'index']) }}">Retour</a>
    <br><br><br>
    <form action="{{ action([App\Http\Controllers\admin\ArticleController::class,'store']) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="category_id">Example select</label>
            <select class="form-control" name="category_id">
                <option value="Select">Select</option>
                @foreach($cats as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->title_cat }}</option>
                @endforeach
            </select>
        </div>
        <br><br>
        <div class="form-group">
            <label for="title">Titre</label>
            <input class="form-control" type="text" name="title">
        </div>
        <br><br>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" id="" cols="30" rows="10" name="body"></textarea>
        </div>
        <br><br>
        <div class="form-control">
            <label for="image">Image</label>
            <input type="file" name="image">
        </div>
        <br><br>
        <input type="submit" value="enregistrer" class="btn-primary btn">

    </form>

@endsection
