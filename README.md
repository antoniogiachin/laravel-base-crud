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

## Terzo passaggio -> permetto inserimento di nuovo comic tramite il form in create
- Il form si trova nella rotta create, la quale restituisce alla vista utente il form da compilare
- il form deve contenerail token di sicurezza di Laravel @csrf
- in ciascun input del form il name deve essere uguale al nome della colonna cui si riferisce
- il form avrà method="POST" e nella action la route per lo store che verrà fatto all'invio dei campi compilati {{ route('comics.store') }}
- nel metodo controller create dico ddi tornare la vista comics.create

## Quarto passaggio -> Recupero nello store i dati del form e li aggiungo al DB
- Come argomenti funzione store del controller scrivo: REQUEST $request, creo una nuova istanza dell'oggetto REQUEST
- salvo in $data, tramite metodo $request->all() un array associativo contenente tutti i dati inseriti nel form
- istanzio nuovo Comic() e lo popolo con elementi presenti in array associativo $data
- per farlo in maniera rapida si può usare il fill, $newComic->fill($data), però devo dichiarare nel model di Comic quali campi sono 'fillable'
- a questo punto chiedo di tornare alla pagina in cui è presente il nuovo fumetto inserito return redirect()->route('comic.show', $newComic->id)

## Quinto passaggio -> modifica dei dati tramite EDIT
Ci restiuisce una pagine simile a quella del create, con la differenza che il metodo chiamato sarà di PUT, non essendo proprio di HTTP, si lascia nel form il method="POST" e poi si inserisce una funzione di Laravel @method="PUT"
- Argomenti funzione edit controller con injection edit(Comic $comic), ritorna view('comic.edit', compact('comic'))
- Stilizzo index con icona collegamento comic.edit e la pagina in questione
- Inserisco nella pagina comic.edit all'interno del form @method("PUT"), la azione richiama alla route relativa al metodo "comic.update"
- Definisco il metodo update, anche qui aggiungo una injection per istanziare un nuovo oggetto comic
- Usando il metodo validate di request definisco delle validazioni, in seguito salvo i dati del form con la funzione di request->all(), poi con $comic->update(), faccio l'aggiornamento e salvo
- Definisco la rotta di ritorno ad operazione completata
- Nella view di edit imposto i value predefiniti con la funzione old, per evitare che in caso di errore i campi vengano svuotati(faccio la stessa cosa per create-store)
- Se la validazione fallisce viene segnalata all'utente: inserisco il seguente snippet di codice nel laout base:
    * [(@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif)]
- Aggiungo le stesse validazione allo store
- Aggiungo il flash data di successo ad entrambi con il metodo ->with e snippet nello show

## Sesto passaggio -> eliminazione tramite DELETE
- Si usa il metodo destroy anche qui al posto di id utilizzo injection
- Uso $comic->delete() come metodo per la cancellazione
- Il pulsante per la gestione della delete essendo un metodo post non può essere un href(che è di GET), sarà dunque un miniform

## Bonus -> tramite javascript, quando l’utente clicca sul pulsante “delete”, chiedere conferma della cancellazione, prima di eliminare l’elemento.

Aggiunto *onclick="return confirm('Vuoi davvero cancellare il fumetto?')"* al form bottone cancellazione