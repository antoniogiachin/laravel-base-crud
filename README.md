- Creo database fumetteria in mySQl
- Mi connetto al DB sul filme .env
- Creo un controller con lo scaffolding CRUD con *php artisan make:controller --resource ComicController*
- Creo un migration per i comics * php artisan make:migration create_comics_table*
- Definisco la struttura della tabella
- creo model comic *php artisan make:model Comic*
- passo struttura migration a DB *php artisan migrate*
- creo seeder per tabella *php artisan make:seeder ComicsTableSeeder*
- il seeder al lancio del comando *php artisan db:seed --class=ComicsTableSeeder* popola dinamicamente il DB con le colonne prendendo le info dal file presente in config comics.php

- Definisco nel web.app le rotte ai metodi comics presenti nel controller tramite *Route::resource...*
- Verifico le rotte create tramite il *route:list*

## Primo passaggio Index-> Visualizzare in tabella tutte le entry del DB
- Creo le views-> layout{base} e cartella comics{index-show-create}
- nel controller definisco le logiche per index-> recupero con il model::all() tutto il contenuto della tabella e lo passo alla vista, nella view index ciclo il contenuto passato e stampo la tabella

## Secondo passaggio Show -> Leggo i dati di uno specifico comic
{ comics/{comic} | comics.show | App\Http\Controllers\ComicController@show }
- Nel metodo controller show passo come argomenti il model e una variabile, sto dicendo di creare una nuova istanza di quell'oggetto/model, a quel punto la funzione ritorna la view e le passa la variabile/nuova istanza.
- nell'index passo al button la route {{ route('comics.show', $comic->id) }}, aggiunta fondamentale il $comic->id;

