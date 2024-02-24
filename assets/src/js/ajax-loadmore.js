const loadmore_buttons = document.querySelectorAll( '.loadmore-button' );

loadmore_buttons.forEach( loadmore_button => {
    loadmore_button.addEventListener( 'click', function( e ) {

        e.preventDefault();

        // do AJAX
        const request = new XMLHttpRequest();

        request.onloadstart = function( e ) {
            console.log( 'onLoadStart' );
            //lm.children( '.loadmore-action-wrapper' ).find( '.loadmore-button' ).hide();
            //lm.children( '.loadmore-action-wrapper' ).find( '.loadmore-spinner' ).show();
        }

        request.onload = function( e ) {
            if ( request.status == 201 ) {
                console.log( 'onLoad' );
                // request.responseText;
                // lm.children( '.loadmore-content-wrapper' ).find( '.loadmore-content' ).append( jqXHR.responseText );
                // lm.children( '.loadmore-action-wrapper' ).find( '.loadmore-spinner' ).hide();

                /*
                nextpage = lm.data( 'nextpage' );
                maxpage  = lm.data( 'maxpage' );

                if( nextpage != maxpage ) {
                    lm.data( 'nextpage', nextpage+1 );
                    lm.children( '.loadmore-action-wrapper' ).find( '.loadmore-button' ).show();
                } else {
                    lm.children( '.loadmore-action-wrapper' ).hide();
                }*/
            }
        }


        request.open( 'POST', mdb_ajax.ajaxurl, true );
        request.setRequestHeader( 'Accept', 'text/html' );
        request.send();
    } );
} );









/*
jQuery( document ).ready( function( $ ) {

    // Listen for a click event on our text input submit button

    $( '.loadmore-button' ).on( 'click', function( e ) {
        e.preventDefault();

        // Detect the ID of the corresponding LoadMore-element

        var lm  = $( '#' + $( this ).data( 'parentid' ) );


        // Get the params of the LoadMore

        var data = lm.data();


        // Do the AJAX magic

        $.ajax( {
            type: 'POST',
            url: mdb_ajax.ajaxurl,
            data: data,
            error: function( jqXHR, testStatus, errorThrown ) {
                console.log( jqXHR );
            },
            beforeSend: function() {
                lm.children( '.loadmore-action-wrapper' ).find( '.loadmore-button' ).hide();
                lm.children( '.loadmore-action-wrapper' ).find( '.loadmore-spinner' ).show();
            },
            complete: function( jqXHR ) {
                lm.children( '.loadmore-content-wrapper' ).find( '.loadmore-content' ).append( jqXHR.responseText );
                lm.children( '.loadmore-action-wrapper' ).find( '.loadmore-spinner' ).hide();

                nextpage = lm.data( 'nextpage' );
                maxpage  = lm.data( 'maxpage' );

                if( nextpage != maxpage ) {
                    lm.data( 'nextpage', nextpage+1 );
                    lm.children( '.loadmore-action-wrapper' ).find( '.loadmore-button' ).show();
                } else {
                    lm.children( '.loadmore-action-wrapper' ).hide();
                }
            }
        } );
    } );
} );
*/
