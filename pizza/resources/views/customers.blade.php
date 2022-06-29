@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Klienci</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">Klienci
                    <a style="float:right" href="{{route('pizza.index')}}">Wyświetl Pizze</a>
                    <a style="float:right" href="{{route('pizza.create')}}">Utwórz Pizze</a>
                </div>
                <div class="card-body">
                <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Użytkownik</th>
                                <th scope="col">E-mail</th>
                             </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                            <tr>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->email}}</td>
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
