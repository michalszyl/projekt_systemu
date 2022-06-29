@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-4">
            <div class="card">
                <div class="card-header">Menu</div>
                <div class="card-body">
                    <ul class="list-group">
                        <a href="{{route('pizza.index')}}" class="list-group-item list-group-item-action">Pizza</a>
                        <a href="{{route('pizza.create')}}" class="list-group-item list-group-item-action">Stwórz Pizze</a>
                    </ul>
                </div>
            </div>
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
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pizza</div>
                
                <form action="{{route('pizza.store')}}" method="post" enctype="multipart/form-data">@csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nazwa pizzy</label>
                        <input type="text" class="form-control" name="name" placeholder="Nazwa pizzy">
                    </div>
                    <div class="form-group">
                        <label for="description">Opis pizzy</label>
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                    <div class="form-inline">
                        <label>Cena Pizzy</label>
                        <input type="number" name="small_pizza_price" class="form-control" placeholder="Cena małej pizzy">
                        <input type="number" name="medium_pizza_price" class="form-control" placeholder="Cena średniej pizzy">
                        <input type="number" name="large_pizza_price" class="form-control" placeholder="Cena dużej pizzy">
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
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary" type="submit">Stwórz Pizze</button>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
