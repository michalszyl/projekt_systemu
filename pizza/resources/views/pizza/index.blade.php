@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-2">
            <div class="card">
                <div class="card-header">Menu</div>
                <div class="card-body">
                    <ul class="list-group">
                        <a href="{{route('pizza.index')}}" class="list-group-item list-group-item-action">Pizza</a>
                        <a href="{{route('pizza.create')}}" class="list-group-item list-group-item-action">Stwórz Pizze</a>
                        <a href="{{route('user.order')}}" class="list-group-item list-group-item-action">Zamówienia</a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Pizza</div>
                <a href="{{route('pizza.create')}}">
                    <button class="btn btn-success" style="float: right">Dodaj Pizzę</button>
                </a>
                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Zdjęcie Pizzy</th>
                                <th scope="col">Nazwa Pizzy</th>
                                <th scope="col">Opis Pizzy</th>
                                <th scope="col">Kategoria Pizzy</th>
                                <th scope="col">Cena Małej Pizzy</th>
                                <th scope="col">Cena Średniej Pizzy</th>
                                <th scope="col">Cena Dużej Pizzy</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                             </tr>
                        </thead>
                        <tbody>
                            @if(count($pizzas)>0)
                            @foreach($pizzas as $key=> $pizza)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td><img src="{{Storage::url($pizza->image)}}" width="80"></td>
                                <td>{{$pizza->name}}</td>
                                <td>{{$pizza->description}}</td>
                                <td>{{$pizza->category}}</td>
                                <td>{{$pizza->small_pizza_price}}</td>
                                <td>{{$pizza->medium_pizza_price}}</td>
                                <td>{{$pizza->large_pizza_price}}</td>
                                <td><a href="{{route('pizza.edit',$pizza->id)}}"><button class="btn btn-primary">Edytuj</button></a></td>
                                <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$pizza->id}}">Usuń</button></td>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$pizza->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <form action="{{route('pizza.destroy',$pizza->id)}}" method="post">@csrf
                                @method('DELETE')
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Potwierdzenie usunięcia Pizzy</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Czy na pewno chcesz usunąc Pizzę?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                                        <button type="submit" class="btn btn-danger">Usuń</button>
                                    </div>
                                    </div>
                                </div>
                                </form>
                                </div>
                            </tr>
                            @endforeach
                            @else 
                            <p>Brak Pizzy do wyświetlenia!</p>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
