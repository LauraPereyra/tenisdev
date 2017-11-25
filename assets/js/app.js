/**
 * Created by JuanPablo on 26/09/2016.
 */
var App = function ( options ) {
    this.options = {
        siteUrl: "http://localhost/tenis.dev/index.php/"
    };
    if ( $.type( options ) === "object" ) {
        $.extend( this.options, options );
    }
};

App.prototype = {
    serialize: function ( element ) {
        var o = {};
        var a = $( element ).serializeArray();
        $.each(a, function() {
            if (o[this.name] !== undefined) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    },
    loadJson: function ( url, callback, config) {
        var _config = {
            data: {},
            method: 'POST',
            preLoader: null,
        };

        if ( $.type( callback ) === "object" ) {
            config = callback;
        }

        if ( $.type( config ) === "object" ) {
            $.extend( _config, config );
        }
        _config.data = ( _config.data !== undefined && $.type( _config.data ) === 'object' ) ? _config.data : {};
        return $.ajax({
            url: (this.options.siteUrl + url),
            method: _config.method,
            data: _config.data,
            dataType: 'json',
            beforeSend: function () {
                if(typeof _config.preLoader === "string") {
                    $( _config.preLoader ).show();
                }
            },
            success: function ( dataJson ) {
                if ( $.type( callback ) === "function" ) {
                    callback( dataJson );
                }
            },
            error: function ( xhr, status, errorThrow ) {
                callback( {} );
                console.log( 'Error: ' + errorThrow );
                console.log( 'Status: ' + status );
                console.log( xhr );
            },
            complete: function () {
                if( typeof _config.preLoader === "string" ) {
                    $( _config.preLoader ).hide();
                }
            }
        });
    },
    sendForm: function ( form, callback ) {
        var that = this;
        $( 'body' ).on( 'submit', form, function ( event ) {
            event.preventDefault();
            var formSerialize = that.serialize( form );
            that.loadJson( $( this ).attr( 'action' ), callback, { preLoader: (form + ' .preloader-wrapper'), data: formSerialize} );
        });
    }
};

var app = new App();