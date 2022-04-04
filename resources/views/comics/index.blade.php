@extends('layouts.base')
@section('pageTitle', 'ListaFumetti')
@section('content')

    <div class="container">
        <h1 class="text-center text-uppercase text-success">I nostri Fumetti</h1>
        <button class="btn btn-primary">
            <a href="{{ route('comics.create') }}" class="text-dark">Aggiungi un nuovo fumetto</a>
        </button>
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
                        <td class="d-flex">
                            <button class="btn btn-primary "><a class="text-dark" href="{{ route('comics.show', $comic->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                              </svg></a>
                            </button>
                            <button class="btn btn-warning ms-1">
                                <a class="text-dark" href="{{ route('comics.edit', $comic->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                      </svg>
                              </svg>
                            </a>
                            </button>
                            {{-- tasto cancellazione --}}
                            <form action="{{ route('comics.destroy', $comic->id) }}" method="POST">
                                
                                @csrf

                                @method('DELETE')

                                <button class="btn btn-danger ms-1 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                      </svg>
                                </button>
                            
                            </form>
                        </td>    
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection