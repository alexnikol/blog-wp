( function(){

    $( function () {

        new Preloader( $( '.preloader' ) );

        $.each( $( '.menu' ), function() {
            new  Menu( $( this ) );
        } );

        $.each( $( '.cookies-information' ), function() {
            new  CookiesInformation( $( this ) );
        } );

        $.each( $('.wpcf7'), function () {
            new ContactForm7Checker( $(this) );
        } );

        $.each( $( '.industries__catalog' ), function() {
            new  IndustriesCatalog( $( this ) );
        } );

        $.each( $( '.popup' ), function() {
            new  Popup( $( this ) );
        } );

        $.each( $( '.subscribe' ), function() {
            new  SubscribeForm( $( this ) );
        } );

        $.each( $( '.contact__form' ), function() {
            new  ContactUsForm( $( this ) );
        } );

        $.each( $( '.is-hide' ), function() {
            new ShowHiddenObjects( $( this ) );
        } );

        $.each( $( '.partners' ), function() {
            new InitSlider( $( this ) );
        } );

        $.each( $( '.js-back-picture' ), function() {
            new BackPictureFullSize ( $( this ) );
        } );

    } );

    var BackPictureFullSize = function ( obj ) {

        var _obj = obj,
            _backgroundPicture = _obj.find( 'img' ),
            _window = $( window );

        var _onEvents = function() {

                _window.on( 'resize', function () {
                    _setFullSize();
                } );

                _backgroundPicture.on( 'load', function () {
                    _setFullSize();
                } );

            },
            _setFullSize = function () {

                _backgroundPicture.removeAttr( 'style' );

                _obj.removeAttr( 'style' );
                _backgroundPicture.removeAttr( 'style' );

                var frameWidth = _obj.outerWidth(),
                    frameHeight = _obj.outerHeight(),
                    pictureWidth = _backgroundPicture.outerWidth(),
                    pictureHeight = _backgroundPicture.outerHeight();

                if ( pictureHeight > frameHeight ) {
                    _obj.css( {
                        'height': pictureHeight
                    } )
                }

            },
            _construct = function() {
                _onEvents();
                _setFullSize();
            };

        _construct()
    };

    var ContactForm7Checker = function( obj ) {

        //private properties
        var _obj = obj,
            _preload = _obj.next( '.contact-form__pleload' ),
            _form = _obj.find( 'form' ),
            _btn = _obj.find( 'button' ),
            _popup = $( '.popup' );

        //private methods
        var _onEvent = function() {

                _form.on( 'submit', function () {
                    _showPreload();
                } );

                _obj.on( {
                    'wpcf7:invalid': function(){

                        var firstField = _obj.find( ' .wpcf7-not-valid' ).first();

                        $( 'html, body' ).animate( {
                            scrollTop: firstField.offset().top - 25
                        }, 600);

                        firstField.focus();

                        _hidePreload();
                    },
                    'wpcf7:spam': function(){
                        _hidePreload();
                    },
                    'wpcf7:mailsent': function(){
                        _showSuccessMessage();
                    },
                    'wpcf7:mailfailed': function(){
                        _hidePreload();
                    },
                } );

            },
            _showPreload = function () {

                _preload.addClass( 'show' );

            },
            _hidePreload = function () {

                _preload.removeClass( 'show' );

            },
            _showSuccessMessage = function () {

                _popup[0].obj.openPopup( _btn );

                _hidePreload();

                setTimeout( function () {
                    _popup[0].obj.closePopup();
                }, 5000 );

            },
            _construct = function() {
                _onEvent();
            };

        //public properties

        //public methods

        _construct();
    };

    var ContactUsForm = function( obj ){

        //private properties
        var _self = this,
            _obj = obj,
            _validation = new FormValidator( _obj ),
            _popup = $( '.popup' ),
            _fields = _obj.find( 'input, textarea' ),
            _btn = _obj.find( 'button' ),
            _arr = {};

        //private methods
        var _init = function(){
                _obj[ 0 ].obj = _self;
            },
            _collectValues = function () {

                _fields.each( function () {

                    var curField = $( this );

                    _arr[ curField.attr( 'name' ) ] = curField.val();

                } );

            },
            _showSuccessMessage = function () {

                _collectValues();

                _popup[0].obj.openPopup( _btn, _arr );

                _obj[0].reset();
                _obj.find( '.valid' ).removeClass( 'valid' );

            };

        //public properties

        //public methods
        _self.openPopup = function () {
            _showSuccessMessage();
        };

        _init();

    };

    var CookiesInformation = function( obj ){

        //private properties
        var _obj = obj,
            _btn = _obj.find( '.btn' ),
            _oldFriend = localStorage.getItem( 'cookiesUser' );

        //private methods
        var _construct = function(){
                _checkUser();
            },
            _onEvent = function () {

                _btn.on( 'click', function () {
                    _obj.remove();
                    localStorage.setItem( 'cookiesUser', true );
                    return false;
                } )
            
            },
            _checkUser = function () {

                if ( _oldFriend ){
                    _obj.remove();
                } else {
                    _onEvent();
                }

            };

        //public properties

        //public methods

        _construct();

    };

    var FormValidator = function (obj) {

        //private properties
        var _obj = obj,
            _self = this,
            _inputs = _obj.find( 'input, textarea' ),
            _fields = _obj.find( '[required]' ),
            _reCapcha = _obj.find( '.g-recaptcha' ),
            _preload = _obj.find( '.preload' ),
            _reCaptchaConfirmation = false,
            _link = _obj.data( 'action' ),
            _request = new XMLHttpRequest(),
            _html = $( 'html, body' );

        //private methods
        var _init = function () {
                _onEvents();
                _obj[ 0 ].obj = _self;
            },
            _addNotTouchedClass = function () {

                _fields.each( function() {

                    var curItem = $(this);

                    if( curItem.val() === '' ){

                        curItem.addClass( 'not-touched' );

                        _addNotTouchedMessage( curItem );

                    }

                    if ( curItem.hasClass( 'valid' ) ){
                        curItem.removeClass( 'not-touched' );
                        _removeNotValidMessage( curItem );
                    }

                } );

            },
            _onEvents = function () {
                _fields.on( {
                    focus: function() {

                        $( this ).removeClass( 'not-touched' );

                    },
                    focusout: function() {

                        var curItem = $(this);

                        _validateField( curItem );

                    },
                    keyup: function () {

                        var curItem = $(this);

                        if ( curItem.hasClass( 'not-valid' ) ){
                            _validateField( curItem );
                        }

                    }
                } );
                _inputs.on( {
                    focusout: function() {

                        var letterCounter = 0;

                        _inputs.each( function () {

                            var curItem = $(this);

                            if ( curItem.val().length > 0 ){
                                letterCounter = letterCounter + 1
                            }

                        } );

                        if ( letterCounter === 0 ) {
                            _inputs.removeClass( 'not-valid not-touched' );

                            _inputs.each( function () {

                                var curItem = $(this);
                                _removeNotValidMessage( curItem );

                            } );

                            _self.valid = false;
                        }

                    }
                } );
                _obj.on( {
                    submit: function() {

                        _preload.addClass( 'show' );

                        _addNotTouchedClass();

                        if( _fields.hasClass( 'not-touched' ) || _fields.hasClass( 'not-valid' ) ) {

                            var notTouchedField = _obj.find('.not-touched:first'),
                                notValidField = _obj.find('.not-valid:first');

                            if ( notTouchedField.length > 0 ){
                                notTouchedField.focus();

                                _html.animate( {
                                    scrollTop: notTouchedField.offset().top - 55
                                }, 600);

                            }

                            if ( notValidField.length > 0 ){
                                notValidField.focus();

                                _html.animate( {
                                    scrollTop: notValidField.offset().top - 55
                                }, 600);

                            }

                            _self.valid = false;

                            _preload.removeClass( 'show' );

                            return false;
                        };

                        _checkCaptcha();

                        return false;

                    }
                } );
            },
            _makeNotValid = function ( field ) {
                field.addClass( 'not-valid' );
                field.removeClass( 'valid' );
                _addNotCorrectMessage( field )
            },
            _makeValid = function ( field ) {
                field.removeClass( 'not-valid' );
                field.addClass( 'valid' );
                _removeNotValidMessage( field );
            },
            _makeNotValidCaptha = function () {

                var message = _reCapcha.find( '.alert' ),
                    alert = ( '<span role="alert" class="alert">Please verify that you are not a robot.</span>' );

                if ( message.length == 0 ) {
                    _reCapcha.append(alert);
                }

            },
            _makeValidCaptha = function () {

                var message = _reCapcha.find( '.alert' );

                if ( message.length > 0 ){
                    message.remove();
                }

                _reCaptchaConfirmation = true;

                _controlCheck();

            },
            _validateEmail = function ( email ) {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            },
            _validateField = function ( field ) {

                var type = field.attr( 'type' ),
                    tagName = field[0].tagName;

                if( type === 'email' || type === 'text' ){

                    if( field.val() === '' ){
                        _makeNotValid( field );
                        _self.valid = false;
                        return false;
                    }

                }

                if( type === 'email' ){
                    if( !_validateEmail( field.val() ) ){
                        _makeNotValid( field );
                        _self.valid = false;
                        return false;
                    }
                }

                if( tagName.toLocaleLowerCase() == 'textarea' ){

                    if( field.val() === '' ){
                        _makeNotValid( field );
                        _self.valid = false;
                        return false;
                    }

                }

                _makeValid( field );

            },
            _controlCheck = function () {

                if( ( _fields.filter( '.valid' ).length === _fields.length ) && _reCaptchaConfirmation ) {
                    _self.valid = true;
                    _obj[0].obj.openPopup();
                }

            },
            _checkCaptcha = function () {

                if ( _reCapcha.length > 0 && !_reCaptchaConfirmation ) {
                    _ajaxRequest();
                } else {
                    _reCaptchaConfirmation = true;

                    _preload.removeClass( 'show' );

                    _controlCheck();

                }

            },
            _addNotTouchedMessage = function ( field ) {

                var curField = field,
                    curLabel = curField.parent( 'label' ),
                    message = curLabel.find( '.alert' ),
                    alert = ( '<span role="alert" class="alert">The field is required.</span>' );

                if ( message.length > 0 ){
                    message.html( 'The field is required.' );
                } else {
                    curLabel.append( alert );
                }

            },
            _addNotCorrectMessage = function ( field ) {

                var curField = field,
                    curLabel = curField.parent( 'label' ),
                    message = curLabel.find( '.alert' ),
                    alert = ( '<span role="alert" class="alert">The e-mail address entered is invalid.</span>' );

                if ( message.length > 0 ){
                    message.html( 'The value entered is invalid.' );
                } else {
                    curLabel.append( alert );
                }

            },
            _removeNotValidMessage = function ( field ) {

                var curField = field,
                    curLabel = curField.parent( 'label' ),
                    message = curLabel.find( '.alert' );

                if ( message.length > 0 ){
                    message.remove();
                }

            },
            _ajaxRequest = function() {

                _request.abort();
                _request = $.ajax( {
                    url: _link,
                    data: {
                        action : 'captcha_valid',
                        'g-recaptcha-response': grecaptcha.getResponse()
                    },
                    dataType: 'html',
                    timeout: 20000,
                    type: "POST",
                    success: function ( msg ) {
                        if ( msg === 'true' ) {
                            _makeValidCaptha();
                        } else {
                            _makeNotValidCaptha();
                        }
                        _preload.removeClass( 'show' );
                    },
                    error: function ( XMLHttpRequest ) {
                        if( XMLHttpRequest.statusText != "abort" ) {
                            alert( 'Error!' );
                        }
                    }
                } );

            };

        //public properties
        _self.valid = false;

        _init();
    };

    var IndustriesCatalog = function( obj ) {

        //private properties
        var _obj = obj,
            _tabWrap = _obj.find( 'dl' ),
            _tabBtn = _obj.find( '.industries__tab-item' ),
            _anchor = _obj.find( '.industries__anchor' ),
            _body = $( 'html, body' ),
            _path = null,
            _window = $( window );

        //private methods
        var _onEvent = function() {

                _tabBtn.on( 'click', function () {

                    var curBtn = $( this ),
                        curBtnWrap = curBtn.parent( 'dl' ),
                        curBtnIndex = curBtnWrap.data( 'id' );

                    _tabBtn.removeClass( 'active' );

                    _showTabWrap( curBtnIndex, true );

                    return false;
                } );

                _anchor.on( 'click', function () {

                    _body.animate( {
                        scrollTop: _obj.offset().top - 10
                    }, 600);

                    return false;
                } );

                _window.on( 'resize', function () {

                    if ( _window.outerWidth() >= 768 ){

                        var activeTabBtn = _tabBtn.filter( '.active' ),
                            activeTabWrap = activeTabBtn.next( 'dd' );

                        _obj.css( 'padding-bottom', activeTabWrap.outerHeight() );
                    }

                } );

            },
            _checkClientLink = function () {

                var url = document.location.hash;

                url = url.replace(/\D/g,'');

                if ( url == '' ){

                    var id = _tabWrap.first().data( 'id' );

                    _showTabWrap( id, false )
                } else (
                    _showTabWrap( url, true )
                )

            },
            _showTabWrap = function ( num, scroll ) {

                var curTabIndex = num,
                    curTab = _tabWrap.filter( '[data-id="'+ curTabIndex +'"]' ),
                    curTabBtn = curTab.children( 'dt' ),
                    curTabWrap = curTab.children( 'dd' ),
                    firstScroll = scroll;

                curTabBtn.addClass( 'active' );

                if ( _window.outerWidth() >= 768 ) {
                    _obj.css( 'padding-bottom', curTabWrap.outerHeight() );
                }

                if ( firstScroll ) {

                    setTimeout( function () {

                        _body.animate( {
                            scrollTop: curTabWrap.offset().top - 10
                        }, 600);

                    }, 300 );

                }

            },
            _init = function() {
                _checkClientLink();
                _onEvent();
            };

        //public properties

        //public methods

        _init();
    };

    var InitSlider = function( obj ) {

        //private properties
        var _obj = obj,
            _swiperSlider = _obj.find( '.swiper-container' ),
            _swiperSlides = _swiperSlider.find( '.swiper-slide' ),
            _btnPrev = $( '<span class="slider-prev-btn" role="button"></span>' ),
            _btnNext = $( '<span class="slider-next-btn" role="button"></span>' ),
            _swiper;

        //private methods
        var _onEvent = function() {

            },
            _initSlider = function() {

                _obj.append(_btnPrev).append(_btnNext);
                _btnPrev = _obj.find(_btnPrev);
                _btnNext = _obj.find(_btnNext);

                _swiper = new Swiper( _swiperSlider, {
                    slidesPerView: 3,
                    spaceBetween: 15,
                    speed: 500,
                    loop: true,
                    threshold: 10,
                    autoplay: {
                        delay: 3000,
                    },
                    breakpoints: {
                        767: {
                            slidesPerView: 1
                        }
                    },
                    navigation: {
                        nextEl: _btnNext,
                        prevEl: _btnPrev
                    }
                } );

            },
            _construct = function() {
                if ( _swiperSlides.length > 3 ) {
                    _initSlider();
                    _onEvent();
                }
            };

        //public properties

        //public methods

        _construct();
    };

    var Menu = function( obj ) {

        //private properties
        var _obj = obj,
            _self = this,
            _mobileBtn = $( '#hamburger' ),
            _body = $( 'body' ),
            _menuItem = _obj.find( '.menu__item' ),
            _menuItemWrap = _obj.find( '.menu__wrap-item' ),
            _site = _body.find( '.site' ),
            _siteHead = _site.find( '.site__header' ),
            _window = $( window ),
            _position = 0;

        //private methods
        var _onEvent = function() {

                _site.on( 'click', function ( e ) {

                    if ( $( e.target ).closest( _menuItemWrap ).length == 0 && _menuItemWrap.hasClass( 'show' ) ){
                        _closeSubMenu();
                    };

                } );

                _obj.on( 'click', function ( e ) {

                    if ( $( e.target ).closest( _menuItemWrap ).length == 0 && _menuItemWrap.hasClass( 'show' ) ){
                        _closeSubMenu();
                    };

                } );

                _mobileBtn.on( 'click', function () {

                    if ( $( this ).hasClass( 'is-active' ) ){
                        _hideMobileMenu();
                    } else {
                        _showMobileMenu();
                    }

                    return false;
                } );

                _menuItem.on( 'click', function () {

                    var curItem = $( this ),
                        curSubmenu = curItem.next( '.menu__submenu' ),
                        curParent = curItem.parent( '.menu__wrap-item' );

                    if ( curSubmenu.length > 0 && _window.outerWidth() < 1200 ){

                        if ( !curParent.hasClass( 'show' ) ){
                            _openSubMenu( curParent );
                            return false;
                        }

                    }

                } );

            },
            _showMobileMenu = function () {

                _mobileBtn.addClass( 'is-active' );

                _obj.addClass( 'show' );

                _position = _window.scrollTop();

                _body.css( 'overflow-y', 'hidden' );

                _site.css( {
                    'position': 'relative',
                    'top': _position * -1
                } );

                _siteHead.removeClass( 'site__header_hidden' );
                _siteHead.addClass( 'site__header_mobile' );

                _self.opened = true;

            },
            _hideMobileMenu = function () {

                _mobileBtn.removeClass( 'is-active' );

                _obj.removeClass( 'show' );

                _body.removeAttr( 'style' );
                _site.removeAttr( 'style' );

                _window.scrollTop( _position );

                _self.opened = false;

                _siteHead.removeClass( 'site__header_mobile' );

                _closeSubMenu();

            },
            _openSubMenu = function ( obj ) {

                var curParent = obj;

                curParent.addClass( 'show' );

            },
            _closeSubMenu = function () {

                _menuItemWrap.removeClass( 'show' );

            },
            _init = function() {
                _onEvent();
                _obj[ 0 ].obj = _self;
            };

        //public properties
        _self.opened = false;

        //public methods

        _init();
    };

    var Popup = function( obj ){

        //private properties
        var _self = this,
            _btnShow =  $( '.popup__open' ),
            _obj = obj,
            _bequests = {},
            _popupWrap = _obj.find( '.popup__wrap' ),
            _popupContents = _obj.find( '.popup__content' ),
            _btnClose = _obj.find( '.popup__close, .popup__cancel' ),
            _scrollConteiner = $( 'html' ),
            _window = $( window );

        //private methods
        var _getScrollWidth = function (){
                var scrollDiv = document.createElement( 'div'),
                    scrollBarWidth;

                scrollDiv.className = 'popup__scrollbar-measure';

                document.body.appendChild( scrollDiv );

                scrollBarWidth = scrollDiv.offsetWidth - scrollDiv.clientWidth;

                document.body.removeChild(scrollDiv);

                return scrollBarWidth;

            },
            _hidePopup = function(){

                _obj.addClass( 'popup_hide' ).removeClass( 'popup_opened' );

                _obj.on( 'webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function() {

                    _scrollConteiner.removeAttr( 'style' );
                    _obj.removeAttr( 'style' );

                    _obj.removeClass( 'popup_hide' );

                    _obj.off( 'webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend' );

                    _bequests = {}

                } );

            },
            _onEvents = function(){

                _obj.on( 'click', function ( e ) {

                    if ( $( e.target ).closest( _popupContents ).length == 0 ){
                        _hidePopup();
                    };

                } );

                _btnShow.on( 'click', function() {

                    var curBtn = $( this );

                    _showPopup( curBtn );

                    return false;
                } );

                _btnClose.on( 'click', function(){
                    _hidePopup();
                    return false;
                } );

            },
            _showPopup = function( btn ){

                var curBtn = btn;

                _setPopupContent( curBtn );

                _scrollConteiner.css( {
                    overflowY: 'hidden',
                    paddingRight: _getScrollWidth()
                } );

                if ( _popupWrap.outerHeight() <= _window.outerHeight() ) {
                    _obj.css( {
                        paddingRight: _getScrollWidth()
                    } );
                }

                _obj.addClass( 'popup_opened' );

            },
            _setPopupContent = function( btn ){

                var curBtn = btn,
                    className = curBtn.data( 'popup' ),
                    curContent = _popupContents.filter( '.popup_' + className );

                _popupContents.css( { display: 'none' } );
                curContent.css( { display: 'block' } );

                if ( _bequests !== {} ){
                    _fillFields();
                }

            },
            _fillFields = function () {

                var input = _obj.find( 'input, textarea' );

                $.each( _bequests, function ( key, val ) {

                    input.filter( '[name='+ key +']' ).val( val );

                } );

            },
            _construct = function(){

                _onEvents();
                _obj[ 0 ].obj = _self;

            };

        //public properties

        //public methods
        _self.openPopup = function ( obj, val ) {

            var curBtn = obj;

            _bequests = val;

            _showPopup( curBtn );

        };

        _self.closePopup = function () {
            _hidePopup();
        };

        _construct();

    };

    var Preloader = function (obj) {

        //private properties
        var _html = $( 'html' ),
            _body = $( 'body' ),
            _preloader = obj;

        //private methods
        var _init = function () {
                _showSite();
            },
            _showSite = function() {

                _preloader.addClass( 'preloader_loaded' );

                setTimeout( function() {
                    _preloader.remove();
                }, 500 );

            };

        //public properties

        //public methods

        _init();
    };

    var SubscribeForm = function( obj ){

        //private properties
        var _self = this,
            _obj = obj,
            _validation = new FormValidator( _obj ),
            _popup = $( '.popup' ),
            _fields = _obj.find( 'input, textarea' ),
            _btn = _obj.find( 'button' ),
            _arr = {};

        //private methods
        var _init = function(){
                _obj[ 0 ].obj = _self;
            },
            _collectValues = function () {

                _fields.each( function () {

                    var curField = $( this );

                    _arr[ curField.attr( 'name' ) ] = curField.val();

                } );

            },
            _showSuccessMessage = function () {

                _collectValues();

                _popup[0].obj.openPopup( _btn, _arr );

                _obj[0].reset();
                _obj.find( '.valid' ).removeClass( 'valid' )

            };

        //public properties

        //public methods
        _self.openPopup = function () {
            _showSuccessMessage();
        };

        _init();

    };

    var ShowHiddenObjects = function( obj ) {

        //private properties
        var _obj = obj,
            _objSpaceBefore = _obj.data( 'space' ),
            _window = $( window );

        //private methods
        var _onEvent = function() {

                _window.on( 'scroll', function () {

                    var topBorder = _window.scrollTop() + _window.outerHeight() * _objSpaceBefore,
                        objTop = _obj.offset().top + _obj.outerHeight();

                    if ( topBorder >= objTop ){
                        _obj.removeClass( 'is-hide' );
                    }

                } );

            },
            _construct = function() {
                _onEvent();
            };

        //public properties

        //public methods

        _construct();
    };

} )();