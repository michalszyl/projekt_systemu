@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Zamówienia</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">Zamówienia
                    <a style="float:right" href="{{route('pizza.index')}}">Wyświetl Pizze</a>
                    <a style="float:right" href="{{route('pizza.create')}}">Utwórz Pizze</a>
                </div>
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
                                <th scope="col">Zaakceptowane</th>
                                <th scope="col">Odrzucone</th>
                                <th scope="col">Zakończone</th>
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
                                <form action="{{route('order.status',$order->id)}}" method="post">@csrf
                                    <td>
                                        <input name="status" type="submit" value="Zaakceptowane" class="btn btn-primary btn-sm">
                                    </td>
                                    <td>
                                        <input name="status" type="submit" value="Odrzucone" class="btn btn-danger btn-sm">
                                    </td>
                                    <td>
                                        <input name="status" type="submit" value="Zrealizowane" class="btn btn-success btn-sm">
                                    </td>
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
