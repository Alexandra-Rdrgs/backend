@extends('layouts.app')

@section('content')
    <a class="btn btn-primary"
       href="{{ action([App\Http\Controllers\admin\ArticleController::class,'index']) }}">Retour</a>
    <br><br><br>
    <form action="{{ action([App\Http\Controllers\admin\ArticleController::class,'update'],['id' => $art->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="category_id">Example select</label>
            <select class="form-control" name="category_id">
                <option value="Select">Select</option>
                @foreach($cats as $cat)
                    @if($cat->id == $art->category_id)
                        <option selected value="{{ $cat->id }}">{{ $cat->title_cat }}</option>
                    @else
                        <option value="{{ $cat->id }}">{{ $cat->title_cat }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <br><br>
        <div class="form-group">
            <label for="title">Titre</label>
            <input class="form-control" type="text" name="title" value="{{ $art->title }}">
        </div>
        <br><br>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" id="" cols="30" rows="10" name="body" >{{ $art->body }}</textarea>
        </div>
        <br><br>
        <div class="form-control">
            <label for="image">Image</label><br>
            <input type="file" name="image">
            <br><br>
            <img src="{{ asset('banner/'.$art->banner) }}" alt="">
        </div>
        <br><br>
        <input type="submit" value="enregistrer" class="btn-primary btn">

    </form>

@endsection
