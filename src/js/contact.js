import {default as Common} from './common';
require('jquery-jpostal-ja');
require('../../vendor/validate/jquery.validate.min.js');
require('../../vendor/validate/localization/messages_ja.js');
export default class contact {
    constructor() {
        let common = new Common();
        if ($('#contactForm').length) {
            $('#contactForm').validate({
                errorElement: 'p',
                errorClass: 'help-block',
                groups: {
                    name: '姓 名',
                },
                errorPlacement: function(error, element) {
                    if (element.attr('name') == '姓' || element.attr('name') == '名') {
                        error.insertAfter('#error-name');
                    } else if (element.attr('name') == 'doui' ) {
                        error.insertAfter('#error-doui');
                    } else {
                        error.insertAfter(element);
                    }
                },
            });
        }
    }
}

