- Creo database fumetteria in mySQl
- Mi connetto al DB sul filme .env
- Creo un controller con lo scaffolding CRUD con *php artisan make:controller --resource ComicController*
- Creo un migration per i comics * php artisan make:migration create_comics_table*
- Definisco la struttura della tabella
- creo model comic *php artisan make:model Comic*
- passo struttura migration a DB *php artisan migrate*
- creo seeder per tabella *php artisan make:seeder ComicsTableSeeder*
- il seeder al lancio del comando *php artisan db:seed --class=ComicsTableSeeder* popola dinamicamente il DB con le colonne prendendo le info dal file presente in config comics.php
