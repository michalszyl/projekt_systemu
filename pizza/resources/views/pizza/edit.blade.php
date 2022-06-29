@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            @if (count($errors) > 0)
                <div class="card mt-5">
                    <div class="card-body">
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            <div class="card">
                <div class="card-header">Edytuj Pizze</div>
                
                <form action="{{route('pizza.update',$pizza->id)}}" method="post" enctype="multipart/form-data">@csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nazwa pizzy</label>
                        <input type="text" class="form-control" name="name" placeholder="Nazwa pizzy" value="{{$pizza->name}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Opis pizzy</label>
                        <textarea class="form-control" name="description">{{$pizza->description}}</textarea>
                    </div>
                    <div class="form-inline">
                        <label>Cena Pizzy</label>
                        <input type="text" name="small_pizza_price" class="form-control" placeholder="Cena małej pizzy" value="{{$pizza->small_pizza_price}}">
                        <input type="text" name="medium_pizza_price" class="form-control" placeholder="Cena średniej pizzy" value="{{$pizza->medium_pizza_price}}">
                        <input type="text" name="large_pizza_price" class="form-control" placeholder="Cena dużej pizzy" value="{{$pizza->large_pizza_price}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Kategoria</label>
                        <select class="form-control" name="category">
                            <option value="traditional">Pizza tradycyjna</option>
                            <option value="vege">Pizza wegetariańska</option>
                            <option value="meat">Pizza z mięsem</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Zdjęcie</label>
                        <input type="file" name="image" class="form-control" name="image">
                        <img src="{{Storage::url($pizza->image)}}" width="80">
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary" type="submit">Edytuj Pizze</button>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
