@extends('layouts.base')
@section('pageTitle', 'ListaFumetti')
@section('content')

    <div class="container">
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
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            {{-- corpo tabella --}}
            <tbody>
                {{-- ciclo comics --}}
                @foreach ($comics as $comic )    
                    <tr>
                        <th scope="row">{{ $comic->id }}</th>
                        <td><img src={{ $comic->thumb }}"" class="w-25" alt="img-{{ $comic->title }}"> </td>
                        <td>{{ $comic->title }}</td>
                        <td>{{ $comic->price }}</td>
                        <td>{{ $comic->series }}</td>
                        <td>{{ $comic->sale_date }}</td>
                        <td>{{ $comic->type }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection