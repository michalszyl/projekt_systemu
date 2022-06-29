@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
           
            <div class="card">
                <div class="card-header">Twoje zamówienia</div>
                <div class="card-body">
                <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Użytkownik</th>
                                <th scope="col">Telefon/E-mail</th>
                                <th scope="col">Data/Czas</th>
                                <th scope="col">Pizza</th>
                                <th scope="col">Mała Pizza</th>
                                <th scope="col">Średnia Pizza</th>
                                <th scope="col">Duża Pizza</th>
                                <th scope="col">Wiadomość</th>
                                <th scope="col">Status</th>
                             </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{$order->user->name}}</td>
                                <td>{{$order->user->email}}</td>
                                <td>{{$order->date}}/{{$order->time}}</td>
                                <td>{{$order->pizza_id}}</td>
                                <td>{{$order->small_pizza}}</td>
                                <td>{{$order->medium_pizza}}</td>
                                <td>{{$order->large_pizza}}</td>                       
                                <td>{{$order->body}}</td>
                                <td>{{$order->status}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
