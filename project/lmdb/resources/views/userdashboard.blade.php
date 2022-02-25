@include('header')
@extends('dashboard')

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ url('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <script src="{{ url('js/script.js') }}" defer></script>
    <title>Dashboard</title>
</head>
@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 style="color: #fd7e14;">Hi {{ Auth::user()->name }}</h1>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <h4 class="card-title dashboard-title">Welcome to your dashboard</h4>
                        <div class="card-body">
                            <h5 class="card-title">Here you can:</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a class="link-dark" href="#handlewatchlist">Handle your watchlist</a>
                            </li>
                            <li class="list-group-item">
                                <a class="link-dark" href="#handleotherlists">Handle other lists</a>
                            </li>
                            <li class="list-group-item">
                                <a class="link-dark" href="#manageusersettings">Manage your settings</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h2 id="handlewatchlist" style="color: #fd7e14;">Your watchlist</h2>
                        </div>
                        <div class="card-body text-center">
                        @csrf
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Movie title</th>
                                    <th>Genre</th>
                                    <th>Rating</th>
                                    <th>Release date</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($watchlists as $watchlist)
                                <tr>
                                    <td>
                                        <a href="{{ url('movie/' . $watchlist->movie->title)}}">
                                            {{ $watchlist->movie->title }}
                                        </a>
                                    </td>
                                    <td> {{ $watchlist->movie->genre }}</td>
                                    <td> {{ $watchlist->movie->rating }}</td>
                                    <td> {{ $watchlist->movie->release_date }}</td>
                                    <td>
                                        <a class="btn btn-danger btn-sm" 
                                        href="{{ url('userdashboard/delete/' . $watchlist->id) }}">Delete</a>
                                    </td>
                                </tr>
                           </div>
                        @endforeach
                            </tbody>
                        </table>
                            </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h2 id="handleotherlists" style="color: #fd7e14;">Other lists</h2>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h2 id="manageusersettings" style="color: #fd7e14;">Manage your settings</h2>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
@include('footer')
@endsection