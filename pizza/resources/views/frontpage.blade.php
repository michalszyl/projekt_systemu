@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-4">
            <div class="card">
                <div class="card-header">Menu</div>

                <div class="card-body">
                        <form acction="{{route('frontpage')}}" method="get">
                            <a href="/">Cofnij</a>
                            <input type="submit" value="Traditional" name="category" class="list-group-item list-group-item-action"></a>
                            <input type="submit" value="Vege" name="category" class="list-group-item list-group-item-action"></a>
                            <input type="submit" value="Meat" name="category" class="list-group-item list-group-item-action"></a>
                        </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pizza</div>

                <div class="card-body">

                    <div class="row">

                    @forelse ( $pizzas as $pizza )
                        <div class="col-md-4 mt-2 text-center" style="border: 1px solid #ccc;">
                        <img src="{{Storage::url($pizza->image)}}" class="img-thumbnail" style="width: 100%;">
                            <p>{{$pizza->name}}</p>
                            <p>{{$pizza->description}}</p>
                            <a href="{{route('pizza.show', $pizza->id)}}">
                                <button class="btn btn-danger mb-1">Zamów</button>
                            </a>
                        </div>

                    @empty
                        <p>Brak Pizzy do wyświetlenia!</p>

                    @endforelse

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
