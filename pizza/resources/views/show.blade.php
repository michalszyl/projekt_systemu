@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-4">
            <div class="card">
                <div class="card-header">Menu</div>

                <div class="card-body">
                    @if(Auth::check())
                    <form action="{{route('order.store')}}" method="post">@csrf 
                        <div class="form-group">
                            <p>Imię: {{auth()->user()->name}}</p>
                            <p>E-mail: {{auth()->user()->email}}</p>
                            <p>Numer telefonu: <input type="number" class="form-control" name="phone"></p>
                            <p>Ilość małej Pizzy: <input type="number" class="form-control" name="small_pizza" value="0"></p>
                            <p>Ilość średniej Pizzy: <input type="number" class="form-control" name="medium_pizza" value="0"></p>
                            <p>Ilość dużej Pizzy: <input type="number" class="form-control" name="large_pizza" value="0"></p>
                            <p><input type="hidden" name="pizza_id" value="{{$pizza->id}}"></p>
                            <p><input type="date" name="date" class="form-control" require></p>
                            <p><input type="time" name="time" class="form-control" require></p>
                            <p><textarea class="form-control" name="body" require></textarea></p>
                            
                            <p class="text-center">
                                <button class="btn btn-danger" type="submit">Złóż zamówienie</button>
                            </p>
                            @if (session('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('message') }}
                                </div>
                            @endif
                            @if (session('errmessage'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('errmessage') }}
                                </div>
                            @endif
                        </div>
                    </form>
                    @else
                    <p><a href="/login">Aby zmaówić Pizzę proszę się zalogować</a></p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pizza</div>

                <div class="card-body">

                    <div class="row">
                        <img src="{{Storage::url($pizza->image)}}" class="img-thumbnail" style="width: 100%;">
                            <p><h3>{{$pizza->name}}</h3></p>
                            <p><h3>{{$pizza->description}}</h3></p>
                            <p>Cena małej Pizzy: {{$pizza->small_pizza_price}}</p>
                            <p>Cena średniej Pizzy: {{$pizza->medium_pizza_price}}</p>
                            <p>Cena dużej Pizzy: {{$pizza->large_pizza_price}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    a.list-group-item{
        font-size: 18px;
    }

    a.list-group-item:hover{
        background-color: red;
        color: white;
    }
    .card-header{
        background-color: red;
        color: white;
        font-size: 20px;
    }
</style>
@endsection
