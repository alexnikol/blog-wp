( function(){

    $( function () {

        "use strict";

        new Preload();

        $.each( $( '.js-video' ), function() {
            new SetSizeIframe ( $( this ) );
        } );

        $.each( $( '.anchor' ), function() {
            new Anchor ( $( this ) );
        } );

    } );

    var Anchor = function ( obj ) {

        var _obj = obj,
            _body = $( 'html, body' );

        var _onEvents = function() {

                _obj.on( {
                    click: function() {

                        var curBtn = $( this ),
                            curMargin = curBtn.data( 'margin' );

                        _body.animate( {
                            scrollTop: $( curBtn.attr( 'href' ) ).offset().top - curMargin
                        }, 600);

                        return false;
                    }
                } );

            },
            _construct = function() {
                _onEvents();
            };

        _construct()
    };

    var Preload = function () {

        //private properties
        var _preload = $( '#preload' );

        //private methods
        function _showSite() {

            _preload.addClass( 'preload_loaded' );

            _preload.on( 'webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function() {
                _preload.remove();
            } );

        };

        //public properties

        //public methods

        document.addEventListener( 'DOMContentLoaded', _showSite() );

    };

    var SetSizeIframe = function (obj) {

        //private properties
        var _obj = obj,
            _window = $( window );

        //private methods
        var _onEvent = function() {

                _window.on( 'resize', function () {
                    _setSize();
                } );

            },
            _setSize = function () {

                var videoWidth = _obj.outerWidth();

                _obj.css( 'height', videoWidth / 1.7777 + 'px' );

            },
            _construct = function() {
                _onEvent();
                _setSize();
            };

        //public properties

        //public methods

        _construct();

    };

} )();