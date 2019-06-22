/******************************************************
 * Contact class used on our auth route form actions
 ******************************************************/
class Contact {

    /**
     * Class constructor, called when instantiating new class object
     */
    constructor() {
        // declare our class properties
        // call init
        this.init();
    }


    /**
     * We run init when our class is first instantiated
     */
    init() {
        // bind events
        this.bindEvents();
    }

    /**
     * bind all necessary events
     */
    bindEvents() {
        let self = this;
        // handle form success action
        $(window).on('contact_form.success', function(e, obj) {
            self.handleSuccess(obj);
        });
        // handle form success action
        $(window).on('contact_form.error', function(e, obj) {
            self.handleError(obj);
        });
        // handle form beforeSubmit action
        $(window).on('contact_form.beforeSubmit', function(e, obj) {
            self.handleBeforeSubmit(obj);
        });
    }

    handleBeforeSubmit(obj) {

        $('.button-wrapper').fadeOut('fast', function() {
            $('.progress-wrapper').fadeIn('fast', function() {
                $('.progress-bar').animate({
                    width: '100%'
                }, 1500, 'linear', function() {
                    $('#contact_form').fadeOut('fast', function() {
                        $('.success-wrapper').fadeIn('fast');
                    });
                });
            });
        });

    }

    handleError(obj) {
        obj.halt = true;
        obj.button.button('reset');
        alert(obj.message);
    }

    handleSuccess(obj) {
        obj.halt = true;
        obj.button.button('reset');
    }

}


/******************************************************
 * Instantiate new class
 ******************************************************/
$(function() {
    new Contact();
});