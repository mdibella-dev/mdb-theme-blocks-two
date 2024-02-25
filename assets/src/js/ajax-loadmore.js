const loadmore_buttons = document.querySelectorAll( '.loadmore-button' );

loadmore_buttons.forEach( loadmore_button => {
    loadmore_button.addEventListener( 'click', function( e ) {

        e.preventDefault();


        // Get the correct loadmore element
        const loadmore = document.querySelector( '#' + e.target.parentElement.dataset.parentid );


        // Prepare the params string
        let dataset = loadmore.dataset;
        let params  = '';

        for ( const [key, value] of Object.entries( dataset ) ) {

            params += ( ( params !== '' )? '&' : '' ) + key + '=' + value;

        }


        // The AJAX handler
        const request = new XMLHttpRequest();

        request.onloadstart = function( e ) {

            loadmore.querySelector( '.loadmore-action-wrapper .loadmore-button' ).style.display  = 'none';
            loadmore.querySelector( '.loadmore-action-wrapper .loadmore-spinner' ).style.display = 'block';

        }

        request.onload = function( e ) {

            if ( request.status == 200 ) {

                loadmore.querySelector( '.loadmore-content-wrapper .loadmore-content' ).innerHTML += request.responseText;
                loadmore.querySelector( '.loadmore-action-wrapper .loadmore-spinner' ).style.display = 'none';

                if( loadmore.dataset.nextpage != loadmore.dataset.maxpage ) {
                    loadmore.dataset.nextpage = parseInt( loadmore.dataset.nextpage ) + 1;
                    loadmore.querySelector( '.loadmore-action-wrapper .loadmore-button' ).style.display = 'block';
                } else {
                    loadmore.querySelector( '.loadmore-action-wrapper' ).style.display = 'none';
                }
            }
        }

        // Do the AJAX request
        // Thx to https://stackoverflow.com/a/60534757
        request.open( 'POST', mdb_ajax.ajaxurl, true );
        request.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded;' );
        request.send( params );
    } );
} );
