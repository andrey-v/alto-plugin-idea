/*!
 * script.js
 * Файл скриптов плагина Idea
 *
 * @author      Андрей Воронов <andreyv@gladcode.ru>
 * @copyrights  Copyright © 2014, Андрей Воронов
 *              Является частью плагина Idea
 * @version     0.0.1 от $DATE$
 */

var ls = ls || {};

/**
 * Гео-объекты
 */
ls.idea = (function ($) {


    this.save = function ($country) {

        var iDescription = $('#idea_text');
        var url = aRouter['ajax'] + 'idea_save';
        var params = {
            text: iDescription.val()
        };

        ls.ajax(url, params, function (result) {
            if (result.bStateError) {
                ls.msg.error(null, result.sMsg);
            } else {
                iDescription.val('');
                $.cookie('uploader_target_tmp', result.sCookie);
                $('.js-uploader-image').attr('src', $('.js-alto-uploader').data('empty'));
                $('.js-uploader-button-remove').css('display', 'none');
            }
        });
    };

    return this;
}).call(ls.idea || {}, jQuery);