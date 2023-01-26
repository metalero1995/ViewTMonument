/*
window.onload = function () {
    // Variables
    const IMAGENES = [
        'img/1920x540.jpg',
        'img/1920x540_2.png',
        'img/1920x540_3.png'
    ];
    const TIEMPO_INTERVALO_MILESIMAS_SEG = 5000;
    let posicionActual = 0;
    let $botonRetroceder = document.querySelector('#retroceder');
    let $botonAvanzar = document.querySelector('#avanzar');
    let $imagen = document.querySelector('#imagen');
    let $botonPlay = document.querySelector('#play');
    let $botonStop = document.querySelector('#stop');
    let intervalo;

    // Funciones

    /**
     * Funcion que cambia la foto en la siguiente posicion
     
    function pasarFoto() {
        if(posicionActual >= IMAGENES.length - 1) {
            posicionActual = 0;
        } else {
            posicionActual++;
        }
        renderizarImagen();
        }

    /**
     * Funcion que cambia la foto en la anterior posicion
     
    function retrocederFoto() {
        if(posicionActual <= 0) {
            posicionActual = IMAGENES.length - 1;
        } else {
            posicionActual--;
        }
        renderizarImagen();
        }

    /**
     * Funcion que actualiza la imagen de imagen dependiendo de posicionActual
     
    function renderizarImagen () {
        $imagen.style.backgroundImage = `url(${IMAGENES[posicionActual]})`;
    }

    /**
     * Activa el autoplay de la imagen
    
    function playIntervalo() {
        intervalo = setInterval(pasarFoto, TIEMPO_INTERVALO_MILESIMAS_SEG);
        // Desactivamos los botones de control
        //$botonAvanzar.setAttribute('disabled', true);
        //$botonRetroceder.setAttribute('disabled', true);
        //$botonPlay.setAttribute('disabled', true);
        //$botonStop.removeAttribute('disabled');

    }

    /**
     * Para el autoplay de la imagen
     
    function stopIntervalo() {
        clearInterval(intervalo);
        // Activamos los botones de control
        $botonAvanzar.removeAttribute('disabled');
        $botonRetroceder.removeAttribute('disabled');
        $botonPlay.removeAttribute('disabled');
        $botonStop.setAttribute('disabled', true);
    }
    
    // Eventos
    $botonAvanzar.addEventListener('click', pasarFoto);
    $botonRetroceder.addEventListener('click', retrocederFoto);
    //$botonPlay.addEventListener('click', playIntervalo);
    //$botonStop.addEventListener('click', stopIntervalo);
    // Iniciar
    renderizarImagen();
    playIntervalo();
} */
/*
$(buscarDatos());
function buscarDatos(consulta){
    $.ajax({
        url: 'clases/cMonuments.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta},
    })
    .done(function(respuesta){
        $('#datos').html(respuesta);
    })
    .fail(function(){
        console.log("error");
    })


}
$(document).on('keyup', '#caja_busqueda', function(){
    var valor = $(this).val();
    if(valor != ""){
        buscarDatos(valor);
    }else{
        buscarDatos();
    }    
})
}*/


var nombre = '';
scannear_botones( ); //carga la pagina y le digo que sea operativo el funcionamiento de los links...

const form = document.querySelector( 'div form' );
form.addEventListener( 'submit', function( e ){
    nombre = form.querySelector( 'input[type=search]' ).value;
    num = 1;

    //const anterior = document.querySelector( '.actual' );
    //if( anterior ) anterior.classList.remove( 'actual' );
    //document.querySelector('#paginador li:first-child a').classList.add( 'actual' );

    buscar( nombre, num );

    e.preventDefault( );
} );


function scannear_botones( ){
    const botones = document.querySelectorAll( '#paginador a' );
    for( let i = 0; i < botones.length; i++ ){
        botones[i].addEventListener( 'click', function( e ){
            //const anterior = document.querySelector( '.actual' );
            //if( anterior ) anterior.classList.remove( 'actual' );
            //e.target.classList.add( 'actual' );
        
            const num = e.target.dataset.pagina;
            buscar( nombre, num );
            e.preventDefault( );
        } );
    }
}



function buscar( que, num ){
    const fd = new FormData( );
          fd.append( 'nombre', que );
          fd.append( 'numero', num );

        fetch( 'controladores/ctrl_Monumentos.php', { method: 'post', body: fd } )
        .then( function( j ){ return j.json( ); })
        .then( function( d ){
            const publicaciones = document.getElementById('publicaciones');
            const paginador = document.getElementById('paginador');

            //RESETEA EL LISTADO DE RESULTADOS DE ESTA PAGINA....
            publicaciones.innerHTML = '';
            d.resultados.forEach( u => {
                publicaciones.innerHTML += `
                    <div>
                        <h3 class="nombres_Monumentos">${ u.nombre }</h3>
                        <img class="imagen" src="${u.url}" alt="">
                    </div>
                `;
            } );
            
            //RESETEAR LA BOTONERA DEL PAGINADOR...
            paginador.innerHTML = '';
            console.log( d );
            for( let i = 1; i <= d.paginas; i++ ){
                let actual = d.actual == i ? " class='actual' " : "";
                paginador.innerHTML += `<li><a href='' ${ actual } data-pagina='${ i }'>${ i }</a></li>`;
            }
            scannear_botones( );
        } );

        $.ajax({
            url: 'clases/cMonuments.php',
            type: 'POST',
            dataType: 'html',
            data: {num: que},
        })
        .fail(function(){
            console.log("error");
        })
}


$(document).on('keyup', '#buscar', function(){
    var valor = $(this).val();
    if(valor != ""){
        buscar(valor, 1);
    }else{
        buscar(valor, num);
    }    
})
/*
$(buscarDatos());
function buscarDatos(consulta){
    $.ajax({
        url: 'clases/cMonuments.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta},
    })
    .done(function(respuesta){
        $('#datos').html(respuesta);
    })
    .fail(function(){
        console.log("error");
    })
}*/