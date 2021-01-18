( function(){

    $( function () {

        "use strict";

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

    function Preload () {

        var preloader = document.getElementById('preload'),
            loadingLine = document.getElementById('preload__loading-line');

        window.addEventListener('load', LoadLine);

        function LoadLine() {
            loadingLine.classList.add('load');
            ShowSite();
        }

        function ShowSite() {
            preloader.classList.add('preload_loaded');
            preloader.addEventListener('transitionend', function (e) {
                e.propertyName === 'opacity' && preloader.remove();
            });
        }

    }

    Preload();

} )();
