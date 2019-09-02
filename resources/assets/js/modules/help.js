/******************************************************
 * Help class used on our auth route form actions
 ******************************************************/
class Help {

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
        $(window).on('help_form.success', function(e, obj) {
            self.handleSuccess(obj);
        });
        // handle form success action
        $(window).on('help_form.error', function(e, obj) {
            self.handleError(obj);
        });
        // handle form beforeSubmit action
        $(window).on('help_form.beforeSubmit', function(e, obj) {
            self.handleBeforeSubmit(obj);
        });
    }

    handleBeforeSubmit(obj) {

    }

    handleError(obj) {
        obj.halt = true;
        obj.button.button('reset');
        alert(obj.message);
    }

    handleSuccess(obj) {
        obj.halt = true;
        obj.button.button('reset');
        $('#help_form textarea').val('');
        $('#help_form .fv-control-feedback').remove();
        $('.help-link').trigger('click');
        Core.notify('success', 'Your message has been delivered, thank you!');
    }

}


/******************************************************
 * Instantiate new class
 ******************************************************/
$(function() {
    new Help();
});