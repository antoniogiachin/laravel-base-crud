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
                    {{-- colonna per azioni eseguibili --}}
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
                        {{-- azione vista --}}
                        <td>
                            <button class="btn btn-primary"><a class="text-dark" href="{{ route('comics.show', $comic->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                              </svg></a></button>
                        </td>    
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection