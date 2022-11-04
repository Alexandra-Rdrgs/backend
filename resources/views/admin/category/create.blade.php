@extends('layouts.app')

@section('content')
    <a class="btn btn-primary" href="{{ action([App\Http\Controllers\admin\CategoryController::class,'index']) }}">Retour</a>
    <br><br><br>
    <form action="{{ action([App\Http\Controllers\admin\CategoryController::class,'store']) }}" method="post">
        @csrf
        <div class="col-md-6 mb-5">
            <input class="form-control" type="text" name="title_cat">
        </div>
        <div class="row mb-5">
            <div class="col-md-8 offset-md-4">
                <input type="submit" value="enregistrer" class="btn-primary btn">
            </div>
        </div>
    </form>

@endsection
