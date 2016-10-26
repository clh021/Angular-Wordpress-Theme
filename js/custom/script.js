(function() {

    if ( jQuery('#render-form').append(localized.contact_form) != '' ) {
        var email = jQuery('#checkvalid');
        var button = jQuery("input[type=submit]");
        var textarea = jQuery('textarea');
        var url = window.location.href;
        button.attr('disabled', 'disabled');
        email.blur(function() {
            var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if ( regex.test(email.val()) ) {
                button.removeAttr('disabled');
            } else {
                button.attr('disabled','disabled');
            }
        });
        jQuery("input[type=submit]").on('click', function() {
            window.setTimeout(function() {
                if (navigator.userAgent.toLowerCase().indexOf('firefox') != -1) {
                    location.reload(true);
                } else {
                    window.location.href = url;
                }
                Materialize.toast('Hemos recibido su mensaje<br />Nos pondremos en contacto', 5000);
                jQuery('form')[0].reset();
                button.attr('disabled','disabled');
                return false;
            }, 500);
        });
    } else {
        jQuery('#render-form').css('display','none');
    }

    if ( localized.google_map != '' ) {
        jQuery('#render-map').append(localized.google_map)
    } else {
        jQuery('#render-map').css('display','none');
    }
    function check_exist(objeto) {
        if ( objeto == '' ) return false;
        for ( var key in objeto )
            if ( objeto[key] == false || objeto[key] == '' ) return false;
        return true;
    }
    if ( check_exist( localized.location ) ) {
        jQuery('#localizacion-calle').text(localized.location.localizacion_calle + ' número ' + localized.location.localizacion_numero);
        jQuery('#localizacion-ciudad').text(localized.location.localizacion_ciudad);
        jQuery('#localizacion-telefono').text(localized.location.localizacion_telefono);
        jQuery('#localizacion-email').text(localized.location.localizacion_email);
    } else {
        jQuery('#render-location').css('display','none');
    }

})();
