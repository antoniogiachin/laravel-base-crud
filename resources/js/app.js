require('./bootstrap');

// nodelist riferendomi con il queryselectorall
const removeComic = document.querySelectorAll('.delete');
console.log(removeComic);
// foreach degli elementi della nodelist esegui un aggiunta di ascoltatore di eventi
removeComic.forEach(removeComic=>{
    removeComic.addEventListener('click',

    // la funzione lanciata dall'ascoltatore: se il confirm è uguale a false non prosseguire l'azione altrimenti si
        function(action){
            if(confirm('Vuoi davvero rimuovere il fumetto?') == false){
                action.preventDefault();
            } 
        }

    )
})


//method="post" action="{{ route('comics.destroy', $comic->id) }}"