var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

/******************************************************
 * Contact class used on our auth route form actions
 ******************************************************/
var Contact = function () {

    /**
     * Class constructor, called when instantiating new class object
     */
    function Contact() {
        _classCallCheck(this, Contact);

        // declare our class properties
        // call init
        this.init();
    }

    /**
     * We run init when our class is first instantiated
     */


    _createClass(Contact, [{
        key: 'init',
        value: function init() {
            // bind events
            this.bindEvents();
        }

        /**
         * bind all necessary events
         */

    }, {
        key: 'bindEvents',
        value: function bindEvents() {
            var self = this;
            // handle form success action
            $(window).on('contact_form.success', function (e, obj) {
                self.handleSuccess(obj);
            });
            // handle form success action
            $(window).on('contact_form.error', function (e, obj) {
                self.handleError(obj);
            });
            // handle form beforeSubmit action
            $(window).on('contact_form.beforeSubmit', function (e, obj) {
                self.handleBeforeSubmit(obj);
            });
        }
    }, {
        key: 'handleBeforeSubmit',
        value: function handleBeforeSubmit(obj) {

            $('.button-wrapper').fadeOut('fast', function () {
                $('.progress-wrapper').fadeIn('fast', function () {
                    $('.progress-bar').animate({
                        width: '100%'
                    }, 1500, 'linear', function () {
                        $('#contact_form').fadeOut('fast', function () {
                            $('.success-wrapper').fadeIn('fast');
                        });
                    });
                });
            });
        }
    }, {
        key: 'handleError',
        value: function handleError(obj) {
            obj.halt = true;
            obj.button.button('reset');
            alert(obj.message);
        }
    }, {
        key: 'handleSuccess',
        value: function handleSuccess(obj) {
            obj.halt = true;
            obj.button.button('reset');
        }
    }]);

    return Contact;
}();

/******************************************************
 * Instantiate new class
 ******************************************************/


$(function () {
    new Contact();
});
