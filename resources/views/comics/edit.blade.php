@extends('layouts.base')

@section('pageTitle')
    Modifica {{ $comic->title }}
@endsection

@section('content')
    <div class="container">
        <h1 class="text-success text-center">Modifica {{ $comic->title }}</h1>

        <form action="{{ route('comics.update', $comic->id) }}" method="POST">
            {{-- token sicurezza --}}
            @csrf

            {{-- metodo put --}}
            @method('PUT')


            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $comic->title) }}">
            </div>

            <div class="mb-3">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Inserisci la descrizione del fumetto" name="description" id="description">{{ old('description', $comic->description) }}"</textarea>
                    <label for="description">Descrizione</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="thumb" class="form-label">Thumbnail</label>
                <input type="text" class="form-control" name="thumb" id="thumb" value="{{ old('thumb', $comic->thumb) }}">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="number" step=".01" class="form-control" name="price" id="price" value="{{ old('price', $comic->price) }}">
            </div>


            <div class="mb-3">
                <label for="series" class="form-label">Serie</label>
                <input type="text" class="form-control" name="series" id="series" value="{{ old('series', $comic->series) }}">
            </div>

            <div class="mb-3">
                <label for="sales_date" class="form-label">Data dii uscita</label>
                <input type="date" class="form-control" name="sale_date" id="sales_date" value="{{ old('sale_date', $comic->sale_date) }}">
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Tipologia</label>
                <input type="text" class="form-control" name="type" id="type" value="{{ old('type', $comic->type) }}">
            </div>

            {{-- button per inviare i dati --}}
            <button type="submit" class="btn btn-success">Modifica</button>

        </form>

    </div>
@endsection