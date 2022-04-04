@extends('layouts.base')

@section('pageTitle')
{{ $comic->title }}
@endsection

@section('content')

    {{-- modifica avvenuta con successo --}}
    @if (session('insert'))
        <div class="alert alert-success">
            {{ session('insert') }}
        </div>
    @endif

    <div class="container">
        <h1 class="text-center"> Ecco i dettagli di: <span class="fw-bold">{{ $comic->title }}</span> </h1>
        <table class="table">
            {{-- head tabella --}}
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Immagine</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Prezzo</th>
                    <th scope="col">Serie</th>
                    <th scope="col">Data uscita</th>
                    <th scope="col">Tipologia</th>
                </tr>
            </thead>
            {{-- corpo tabella --}}
            <tbody>
                
                <tr>
                    <th scope="row">{{ $comic->id }}</th>
                    <td><img src={{ $comic->thumb }}"" class="w-25" alt="img-{{ $comic->title }}"> </td>
                    <td>{{ $comic->title }}</td>
                    <td>{{ $comic->price }}</td>
                    <td>{{ $comic->series }}</td>
                    <td>{{ $comic->sale_date }}</td>
                    <td>{{ $comic->type }}</td>   
                </tr>
                
            </tbody>
        </table>
        <button class="btn btn-primary">
            <a class="text-dark" href="{{ route('comics.index') }}">Torna alla pagina iniziale</a>
        </button>
    </div>

@endsection