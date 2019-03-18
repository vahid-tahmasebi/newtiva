// begin bootstrap file input jquery plugin
+function ($) {
    "use strict";
    /* ===========================================================
     * Bootstrap: fileinput.js v3.1.3
     * http://jasny.github.com/bootstrap/javascript/#fileinput
     * ===========================================================
     * Copyright 2012-2014 Arnold Daniels
     *
     * Licensed under the Apache License, Version 2.0 (the "License")
     * you may not use this file except in compliance with the License.
     * You may obtain a copy of the License at
     *
     * http://www.apache.org/licenses/LICENSE-2.0
     *
     * Unless required by applicable law or agreed to in writing, software
     * distributed under the License is distributed on an "AS IS" BASIS,
     * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
     * See the License for the specific language governing permissions and
     * limitations under the License.
     * ========================================================== */
    var isIE = window.navigator.appName == 'Microsoft Internet Explorer'

    // FILEUPLOAD PUBLIC CLASS DEFINITION
    // =================================

    var Fileinput = function (element, options) {
        this.$element = $(element)

        this.$input = this.$element.find(':file')
        if (this.$input.length === 0) return

        this.name = this.$input.attr('name') || options.name

        this.$hidden = this.$element.find('input[type=hidden][name="' + this.name + '"]')
        if (this.$hidden.length === 0) {
            this.$hidden = $('<input type="hidden">').insertBefore(this.$input)
        }

        this.$preview = this.$element.find('.fileinput-preview')
        var height = this.$preview.css('height')
        if (this.$preview.css('display') !== 'inline' && height !== '0px' && height !== 'none') {
            this.$preview.css('line-height', height)
        }

        this.original = {
            exists: this.$element.hasClass('fileinput-exists'),
            preview: this.$preview.html(),
            hiddenVal: this.$hidden.val()
        }

        this.listen()
    }

    Fileinput.prototype.listen = function () {
        this.$input.on('change.bs.fileinput', $.proxy(this.change, this))
        $(this.$input[0].form).on('reset.bs.fileinput', $.proxy(this.reset, this))

        this.$element.find('[data-trigger="fileinput"]').on('click.bs.fileinput', $.proxy(this.trigger, this))
        this.$element.find('[data-dismiss="fileinput"]').on('click.bs.fileinput', $.proxy(this.clear, this))
    },

        Fileinput.prototype.change = function (e) {
            var files = e.target.files === undefined ? (e.target && e.target.value ? [{name: e.target.value.replace(/^.+\\/, '')}] : []) : e.target.files

            e.stopPropagation()

            if (files.length === 0) {
                this.clear()
                return
            }

            this.$hidden.val('')
            this.$hidden.attr('name', '')
            this.$input.attr('name', this.name)

            var file = files[0]

            if (this.$preview.length > 0 && (typeof file.type !== "undefined" ? file.type.match(/^image\/(gif|png|jpeg)$/) : file.name.match(/\.(gif|png|jpe?g)$/i)) && typeof FileReader !== "undefined") {
                var reader = new FileReader()
                var preview = this.$preview
                var element = this.$element

                reader.onload = function (re) {
                    var $img = $('<img>')
                    $img[0].src = re.target.result
                    files[0].result = re.target.result

                    element.find('.fileinput-filename').text(file.name)

                    // if parent has max-height, using `(max-)height: 100%` on child doesn't take padding and border into account
                    if (preview.css('max-height') != 'none') $img.css('max-height', parseInt(preview.css('max-height'), 10) - parseInt(preview.css('padding-top'), 10) - parseInt(preview.css('padding-bottom'), 10) - parseInt(preview.css('border-top'), 10) - parseInt(preview.css('border-bottom'), 10))

                    preview.html($img)
                    element.addClass('fileinput-exists').removeClass('fileinput-new')

                    element.trigger('change.bs.fileinput', files)
                }

                reader.readAsDataURL(file)
            } else {
                this.$element.find('.fileinput-filename').text(file.name)
                this.$preview.text(file.name)

                this.$element.addClass('fileinput-exists').removeClass('fileinput-new')

                this.$element.trigger('change.bs.fileinput')
            }
        },

        Fileinput.prototype.clear = function (e) {
            if (e) e.preventDefault()

            this.$hidden.val('')
            this.$hidden.attr('name', this.name)
            this.$input.attr('name', '')

            //ie8+ doesn't support changing the value of input with type=file so clone instead
            if (isIE) {
                var inputClone = this.$input.clone(true);
                this.$input.after(inputClone);
                this.$input.remove();
                this.$input = inputClone;
            } else {
                this.$input.val('')
            }

            this.$preview.html('')
            this.$element.find('.fileinput-filename').text('')
            this.$element.addClass('fileinput-new').removeClass('fileinput-exists')

            if (e !== undefined) {
                this.$input.trigger('change')
                this.$element.trigger('clear.bs.fileinput')
            }
        },

        Fileinput.prototype.reset = function () {
            this.clear()

            this.$hidden.val(this.original.hiddenVal)
            this.$preview.html(this.original.preview)
            this.$element.find('.fileinput-filename').text('')

            if (this.original.exists) this.$element.addClass('fileinput-exists').removeClass('fileinput-new')
            else this.$element.addClass('fileinput-new').removeClass('fileinput-exists')

            this.$element.trigger('reset.bs.fileinput')
        },

        Fileinput.prototype.trigger = function (e) {
            this.$input.trigger('click')
            e.preventDefault()
        }


    // FILEUPLOAD PLUGIN DEFINITION
    // ===========================

    var old = $.fn.fileinput

    $.fn.fileinput = function (options) {
        return this.each(function () {
            var $this = $(this),
                data = $this.data('bs.fileinput')
            if (!data) $this.data('bs.fileinput', (data = new Fileinput(this, options)))
            if (typeof options == 'string') data[options]()
        })
    }

    $.fn.fileinput.Constructor = Fileinput


    // FILEINPUT NO CONFLICT
    // ====================

    $.fn.fileinput.noConflict = function () {
        $.fn.fileinput = old
        return this
    }


    // FILEUPLOAD DATA-API
    // ==================

    $(document).on('click.fileinput.data-api', '[data-provides="fileinput"]', function (e) {
        var $this = $(this)
        if ($this.data('bs.fileinput')) return
        $this.fileinput($this.data())

        var $target = $(e.target).closest('[data-dismiss="fileinput"],[data-trigger="fileinput"]');
        if ($target.length > 0) {
            e.preventDefault()
            $target.trigger('click.bs.fileinput')
        }
    })

}(window.jQuery);

// end bootstrap file input jquery plugin

function show_alert(msg, status) {
    Lobibox.notify(status, {
        title: false,
        width: 420,
        msg: msg,
        showClass: 'bounceIn',
        hideClass: 'bounceOut',
        position: 'top right',
        delay: 4500
    });
    return this;
}

function open_media_uploader_add_video() {

    // video
    var media_uploader = null;
    media_uploader = wp.media({
        frame: "video",
        state: "video-details"
    });
    media_uploader.on("update", function () {

        var video_url = media_uploader.state().media.attachment.changed.url;
        tinymce.activeEditor.insertContent('<video class="wp-video-shortcode" src="' + video_url + '" style="width: 100%; height: auto" controls><source src="' + video_url + '"></video>');
    });
    media_uploader.open();
}

function open_media_uploader_add_image() {

    // image
    var media_uploader = null;
    media_uploader = wp.media({
        frame: "post",
        state: "insert",
        multiple: false
    });

    media_uploader.on("insert", function () {
        var json = media_uploader.state().get("selection").first().toJSON();

        var image_url = json.url;
        tinymce.activeEditor.insertContent('<img alt="Smiley face" style="width: 100%; height: auto" src="' + image_url + '"/>');
    });
    media_uploader.open();
}

function open_media_uploader_add_audio() {

    // image
    var media_uploader = null;
    media_uploader = wp.media({
        frame: "post",
        state: "insert",
        multiple: false
    });

    media_uploader.on("insert", function () {
        var json = media_uploader.state().get("selection").first().toJSON();

        var audio_url = json.url;
        tinymce.activeEditor.insertContent('<audio class="wp-video-shortcode" src="' + audio_url + '" style="width: 100%; height: auto" controls><source src="' + audio_url + '"></audio>');
    });
    media_uploader.open();
}

function open_media_uploader_add_msg_attach() {
    var media_uploader = null;
    media_uploader = wp.media({
        frame: "post",
        state: "insert",
        multiple: false
    });

    media_uploader.on("insert", function () {
        var json = media_uploader.state().get("selection").first().toJSON();

        var image_url = json.url;
        tinymce.activeEditor.insertContent('<img alt="Smiley face" style="width: 100%; height: auto" src="' + image_url + '"/>');
    });
    media_uploader.open();
}

function open_media_uploader_add_ticket_att() {

    // image
    var media_uploader = null;
    media_uploader = wp.media({
        frame: "post",
        state: "insert",
        multiple: false
    });

    media_uploader.on("insert", function () {
        var json = media_uploader.state().get("selection").first().toJSON();

        var image_url = json.url;
        // tinymce.activeEditor.insertContent('<img alt="Smiley face" style="width: 100%; height: auto" src="' + image_url + '"/>');
        $('#ticket_att').val(image_url);
    });
    media_uploader.open();
} // add in tiva v5

var AppInbox = function () {

    var content = $('.inbox-content');
    var loading = $('.inbox-loading');
    var listListing = '';

    var loadInbox = function (el, name) {
        var url = 'app_inbox_inbox.html';
        var title = $('.inbox-nav > li.' + name + ' a').attr('data-title');
        listListing = name;

        loading.show();
        content.html('');
        toggleButton(el);

        $.ajax({
            type: "GET",
            cache: false,
            url: url,
            dataType: "html",
            success: function (res) {
                toggleButton(el);

                $('.inbox-nav > li.active').removeClass('active');
                $('.inbox-nav > li.' + name).addClass('active');
                $('.inbox-header > h1').text(title);

                loading.hide();
                content.html(res);
                if (Layout.fixContentHeight) {
                    Layout.fixContentHeight();
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                toggleButton(el);
            },
            async: false
        });

        // handle group checkbox:
        jQuery('body').on('change', '.mail-group-checkbox', function () {
            var set = jQuery('.mail-checkbox');
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                alert(checked);
                $(this).attr("checked", checked);
            });
        });
    }

    var loadMessage = function (el, name, resetMenu) {
        var url = 'app_inbox_view.html';

        loading.show();
        content.html('');
        toggleButton(el);

        var message_id = el.parent('tr').attr("data-messageid");

        $.ajax({
            type: "GET",
            cache: false,
            url: url,
            dataType: "html",
            data: {'message_id': message_id},
            success: function (res) {
                toggleButton(el);

                if (resetMenu) {
                    $('.inbox-nav > li.active').removeClass('active');
                }
                $('.inbox-header > h1').text('View Message');

                loading.hide();
                content.html(res);
                Layout.fixContentHeight();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                toggleButton(el);
            },
            async: false
        });
    }

    var initWysihtml5 = function () {
        $('.inbox-wysihtml5').wysihtml5({
            "stylesheets": ["../assets/global/plugins/bootstrap-wysihtml5/wysiwyg-color.css"]
        });
    }

    var initFileupload = function () {

        $('#fileupload').fileupload({
            // Uncomment the following to send cross-domain cookies:
            //xhrFields: {withCredentials: true},
            url: '../assets/global/plugins/jquery-file-upload/server/php/',
            autoUpload: true
        });

        // Upload server status check for browsers with CORS support:
        if ($.support.cors) {
            $.ajax({
                url: '../assets/global/plugins/jquery-file-upload/server/php/',
                type: 'HEAD'
            }).fail(function () {
                $('<span class="alert alert-error"/>')
                    .text('Upload server currently unavailable - ' +
                        new Date())
                    .appendTo('#fileupload');
            });
        }
    }

    var loadCompose = function (el) {
        var url = 'app_inbox_compose.html';

        loading.show();
        content.html('');
        toggleButton(el);

        // load the form via ajax
        $.ajax({
            type: "GET",
            cache: false,
            url: url,
            dataType: "html",
            success: function (res) {
                toggleButton(el);

                $('.inbox-nav > li.active').removeClass('active');
                $('.inbox-header > h1').text('Compose');

                loading.hide();
                content.html(res);

                initFileupload();
                initWysihtml5();

                $('.inbox-wysihtml5').focus();
                Layout.fixContentHeight();
                App.initUniform();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                toggleButton(el);
            },
            async: false
        });
    }

    var loadReply = function (el) {
        var messageid = $(el).attr("data-messageid");
        var url = 'app_inbox_reply.html&messageid=' + messageid;

        loading.show();
        content.html('');
        toggleButton(el);

        // load the form via ajax
        $.ajax({
            type: "GET",
            cache: false,
            url: url,
            dataType: "html",
            success: function (res) {
                toggleButton(el);

                $('.inbox-nav > li.active').removeClass('active');
                $('.inbox-header > h1').text('Reply');

                loading.hide();
                content.html(res);
                $('[name="message"]').val($('#reply_email_content_body').html());

                handleCCInput(); // init "CC" input field

                initFileupload();
                initWysihtml5();
                Layout.fixContentHeight();
                App.initUniform();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                toggleButton(el);
            },
            async: false
        });
    }

    var loadSearchResults = function (el) {
        var url = 'app_inbox_inbox.html';

        loading.show();
        content.html('');
        toggleButton(el);

        $.ajax({
            type: "GET",
            cache: false,
            url: url,
            dataType: "html",
            success: function (res) {
                toggleButton(el);

                $('.inbox-nav > li.active').removeClass('active');
                $('.inbox-header > h1').text('Search');

                loading.hide();
                content.html(res);
                Layout.fixContentHeight();
                App.initUniform();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                toggleButton(el);
            },
            async: false
        });
    }

    var handleCCInput = function () {
        var the = $('.inbox-compose .mail-to .inbox-cc');
        var input = $('.inbox-compose .input-cc');
        the.hide();
        input.show();
        $('.close', input).click(function () {
            input.hide();
            the.show();
        });
    }

    var handleBCCInput = function () {

        var the = $('.inbox-compose .mail-to .inbox-bcc');
        var input = $('.inbox-compose .input-bcc');
        the.hide();
        input.show();
        $('.close', input).click(function () {
            input.hide();
            the.show();
        });
    }

    var toggleButton = function (el) {
        if (typeof el == 'undefined') {
            return;
        }
        if (el.attr("disabled")) {
            el.attr("disabled", false);
        } else {
            el.attr("disabled", true);
        }
    }

    return {
        //main function to initiate the module
        init: function () {

            // handle compose btn click
            $('.inbox').on('click', '.compose-btn a', function () {
                loadCompose($(this));
            });

            // handle discard btn
            $('.inbox').on('click', '.inbox-discard-btn', function (e) {
                e.preventDefault();
                loadInbox($(this), listListing);
            });

            // handle reply and forward button click
            $('.inbox').on('click', '.reply-btn', function () {
                loadReply($(this));
            });

            // handle view message
            $('.inbox-content').on('click', '.view-message', function () {
                loadMessage($(this));
            });

            // handle inbox listing
            $('.inbox-nav > li.inbox > a').click(function () {
                loadInbox($(this), 'inbox');
            });

            // handle sent listing
            $('.inbox-nav > li.sent > a').click(function () {
                loadInbox($(this), 'sent');
            });

            // handle draft listing
            $('.inbox-nav > li.draft > a').click(function () {
                loadInbox($(this), 'draft');
            });

            // handle trash listing
            $('.inbox-nav > li.trash > a').click(function () {
                loadInbox($(this), 'trash');
            });

            //handle compose/reply cc input toggle
            $('.inbox-content').on('click', '.mail-to .inbox-cc', function () {
                handleCCInput();
            });

            //handle compose/reply bcc input toggle
            $('.inbox-content').on('click', '.mail-to .inbox-bcc', function () {
                handleBCCInput();
            });

            //handle loading content based on URL parameter
            if (App.getURLParameter("a") === "view") {
                loadMessage();
            } else if (App.getURLParameter("a") === "compose") {
                loadCompose();
            } else {
                $('.inbox-nav > li.inbox > a').click();
            }

        }

    };

}();
var body = $('body');


jQuery(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
    AppInbox.init();

    body.on('click', '#up_ticket_att', function (e) {
        e.preventDefault();
        open_media_uploader_add_ticket_att();
    }); // add add ticket att in tiva v5

    body.on("click", '#send_msg_attach', function (e) {
        e.preventDefault();
        open_media_uploader_add_msg_attach();
    });
    body.on("click", '.save-edit-comment', function (event) {
        event.preventDefault();
        var id = $('.frm-comment-id[data-id=' + $(this).data('id') + ']').val();
        var comment_content = $('.frm-comment-content[data-id=' + $(this).data('id') + ']').val();
        var comment_text = $('.mt-comment-text[data-id=' + $(this).data('id') + ']');
        $.ajax({
            url: data.ajax_url,
            type: 'post',
            dataType: 'json',
            data: {
                action: 'tiva_user_edit_comment',
                comment_id: id,
                comment_content: comment_content
            },
            success: function (response) {
                show_alert(response.msg, response.error);
                comment_text.text(response.update_comment).fadeOut(300).fadeIn(300);
            },
            error: function () {
            }

        });

    });
    body.on("click", '.save-edit-comment-trash', function (event) {
        event.preventDefault();
        var id = $('.frm-comment-id[data-id=' + $(this).data('id') + ']').val();
        var comment_content = $('.frm-comment-content[data-id=' + $(this).data('id') + ']').val();
        var comment_text = $('.mt-comment-text[data-id=' + $(this).data('id') + ']');
        $.ajax({
            url: data.ajax_url,
            type: 'post',
            dataType: 'json',
            data: {
                action: 'tiva_user_edit_comment_trash',
                comment_id: id,
                comment_content: comment_content
            },
            success: function (response) {
                show_alert(response.msg, response.error);
                comment_text.text(response.update_comment).fadeOut(300).fadeIn(300).hide();
            },
            error: function () {
            }

        });

    });
    body.on("click", 'span.trash-icon', function () {

        // alert($('span.trash-icon[data-id='++).data('id'));
        var $this = $('span.trash-icon[data-id=' + $(this).data('id') + ']');
        var $post_wrraper = $('.post-wrapper_col[data-id=' + $(this).data('id') + ']');
        var id = $this.data('id');

        $.ajax({
            url: data.ajax_url,
            type: 'post',
            dataType: 'json',
            data: {
                action: 'tiva_user_delete_favorite_post',
                post_id: id
            },
            success: function (response) {
                show_alert(response.msg, response.notification);
                $post_wrraper.fadeOut(300);
            },
            error: function () {
            }

        });

    });
    body.on("click", '.trash-icon-post-hold', function () {

        var $this = $('span.trash-icon-post-hold[data-id=' + $(this).data('id') + ']');
        var $post_wrraper = $('.post-wrapper_col[data-id=' + $(this).data('id') + ']');
        var id = $this.data('id');

        $.ajax({
            url: data.ajax_url,
            type: 'post',
            dataType: 'json',
            data: {
                action: 'tiva_user_delete_hold_post',
                post_id: id
            },
            success: function (response) {
                show_alert(response.msg, response.notification);
                $post_wrraper.fadeOut(300);
            },
            error: function () {
            }

        });

    });
    body.on("click", '#add_video', function () {
        open_media_uploader_add_video();
    });
    body.on("click", '#add_image', function () {
        open_media_uploader_add_image();
    });
    body.on("click", '#add_audio', function () {
        open_media_uploader_add_audio();
    });
    $("#send_post_form").submit(function () {
        var post_title = $('.post_title').val();
        var post_content = tinyMCE.editors[$('#post_content').attr('id')].getContent();
        var fileName = $(".post_thumbnail").val();
        var allVals = [];
        $('.categories-checkbox :checked').each(function () {
            allVals.push($(this).val());
        });
        // alert(allVals);
        // return false;
        var radioValue = $("input[name='post_format']:checked").val();
        if (fileName === '' || post_title === '' || post_content === '' || allVals.length === 0 || radioValue === '') {
            show_alert('لطفا فیلد های اجباری را پر کنید.', 'error');
            return false;
        }
    });
    body.on("click", '#test_ajax', function () {
        var post_title = $('.post_title').val();
        var post_content = tinyMCE.editors[$('#post_content').attr('id')].getContent();
        var files = $('.post_thumbnail').prop("files");
        var file_up = $.map(files, function (val) {
            return val.name;
        });

        var allVals = [];
        $('.categories-checkbox :checked').each(function () {
            allVals.push($(this).val());
        });
        var radioValue = $("input[name='post_format']:checked").val();
        // if (typeof file === 'undefined' || post_title === '' || post_content === '' || allVals === '' || radioValue === '') {
        //     show_alert('لطفا فیلد های اجباری را پر کنید.', 'error');
        //     return;
        // }

        $.ajax({
            url: data.ajax_url,
            processData: false,
            contentType: false,
            type: 'post',
            dataType: 'json',
            data: {
                action: 'tiva_user_send_post',
                post_title: post_title,
                post_content: post_content,
                file: file_up,
                post_cat: allVals,
                post_format: radioValue
            },
            success: function (response) {
                show_alert(response.mssg, response.error)
            },
            error: function () {
            }

        });

    });
    body.on("click", '.karino_user_block', function (event) {
        event.preventDefault();
        var $this = $('.karino_user_block[data-id=' + $(this).data('id') + ']');
        var id = $this.data('id');
        var $admin_user_card_wrraper = $('.admin_user_card_wrraper[data-id=' + $(this).data('id') + ']');
        $.ajax({
            url: data.ajax_url,
            type: 'post',
            dataType: 'json',
            data: {
                action: 'karino_admin_panel_user_block',
                user_id: id
            },
            success: function (response) {
                show_alert(response.msg, response.notification);
                if (response.notification === 'success') {
                    $admin_user_card_wrraper.fadeOut(300);
                }

            },
            error: function () {
            }

        });

    });
    body.on("click", '.karino_user_unblock', function (event) {
        event.preventDefault();
        var $this = $('.karino_user_unblock[data-id=' + $(this).data('id') + ']');
        var id = $this.data('id');
        var $admin_user_card_wrraper = $('.admin_user_card_wrraper[data-id=' + $(this).data('id') + ']');
        $.ajax({
            url: data.ajax_url,
            type: 'post',
            dataType: 'json',
            data: {
                action: 'karino_admin_panel_user_unblock',
                user_id: id
            },
            success: function (response) {
                show_alert(response.msg, response.notification);
                if (response.notification === 'success') {
                    $admin_user_card_wrraper.fadeOut(300);
                }

            },
            error: function () {
            }

        });

    });
    body.on("click", '.karino-user-remove', function (event) {
        event.preventDefault();
        var $this = $('.karino-user-remove[data-id=' + $(this).data('id') + ']');
        var id = $this.data('id');
        var $admin_user_card_wrraper = $('.admin_user_card_wrraper[data-id=' + $(this).data('id') + ']');
        $.ajax({
            url: data.ajax_url,
            type: 'post',
            dataType: 'json',
            data: {
                action: 'karino_admin_panel_user_remove',
                user_id: id
            },
            success: function (response) {
                show_alert(response.msg, response.notification);
                if (response.notification === 'success') {
                    $admin_user_card_wrraper.fadeOut(300);
                }

            },
            error: function () {
            }

        });

    });
    body.on("click", '.karino-show-msg', function (event) {
        event.preventDefault();
        var $this = $('.karino-show-msg[data-id=' + $(this).data('id') + ']');
        var id = $this.data('id');
        // var $admin_user_card_wrraper = $('.admin_user_card_wrraper[data-id=' + $(this).data('id') + ']');
        $.ajax({
            url: data.ajax_url,
            type: 'post',
            dataType: 'json',
            data: {
                action: 'karino_admin_panel_show_msg',
            },
            success: function (response) {
                // show_alert(response.msg, response.notification);
                // if (response.notification === 'success') {
                //     $admin_user_card_wrraper.fadeOut(300);
                // }

            },
            error: function () {
            }

        });

    });

    body.on("click", '.karino_active_user', function (event) {
        event.preventDefault();
        var $this = $('.karino_active_user[data-id=' + $(this).data('id') + ']');
        var id = $this.data('id');
        var $admin_user_card_wrraper = $('.admin_user_card_wrraper[data-id=' + $(this).data('id') + ']');
        $.ajax({
            url: data.ajax_url,
            type: 'post',
            dataType: 'json',
            data: {
                action: 'karino_admin_panel_user_active_account',
                user_id: id
            },
            success: function (response) {
                show_alert(response.msg, response.notification);
                if (response.notification === 'success') {
                    $admin_user_card_wrraper.fadeOut(300);
                }

            },
            error: function () {
            }

        });

    }); // /Add in tiva v3.1


});

var TableDatatablesColreorder = function () {
    var e = function () {
        var e = $("#sample_1");
        e.dataTable({
            language: {
                aria: {
                    sortAscending: "فعال برای مرتب سازی صعودی :",
                    sortDescending: "فعال برای مرتب سازی نزولی :"
                },
                emptyTable: "رکوردی وجود ندارد.",
                info: "نمایش _START_ تا _END_ رکورد از مجموع _TOTAL_ رکورد",
                infoEmpty: "هیچ رکوردی یافت نشد",
                infoFiltered: "(فیلتر شده از مجموع _MAX_ رکورد)",
                lengthMenu: "_MENU_ تعداد نمایش رکوردها",
                search: "جستجوی پیشرفته:",
                zeroRecords: "رکوردی مطابق با عبارت جستجو شده توسط شما یافت نشد. "
            },
            buttons: [],
            responsive: !0,
            colReorder: {
                reorderCallback: function () {
                    console.log("callback")
                }
            },
            order: [],
            lengthMenu: [[5, 10, 15, 20, -1], [5, 10, 15, 20, "همه"]],
            pageLength: 10,
            dom: "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>"
        })
    }, o = function () {
        var e = $("#sample_2");
        e.dataTable({
            language: {
                aria: {
                    sortAscending: ": activate to sort column ascending",
                    sortDescending: ": activate to sort column descending"
                },
                emptyTable: "No data available in table",
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
                infoEmpty: "No entries found",
                infoFiltered: "(filtered1 from _MAX_ total entries)",
                lengthMenu: "_MENU_ entries",
                search: "Search:",
                zeroRecords: "No matching records found"
            },
            buttons: [
                {extend: "print", className: "btn default"}],
            colReorder: {
                reorderCallback: function () {
                    console.log("callback")
                }
            },
            order: [[0, "asc"]],
            lengthMenu: [[5, 10, 15, 20, -1], [5, 10, 15, 20, "همه"]],
            pageLength: 5,
            dom: "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>"
        })
    }, n = function () {
        var e = $("#sample_3");
        e.dataTable({
            language: {
                aria: {
                    sortAscending: "فعال برای مرتب سازی صعودی :",
                    sortDescending: "فعال برای مرتب سازی نزولی :"
                },
                emptyTable: "رکوردی وجود ندارد.",
                info: "نمایش _START_ تا _END_ رکورد از مجموع _TOTAL_ رکورد",
                infoEmpty: "هیچ رکوردی یافت نشد",
                infoFiltered: "(فیلتر شده از مجموع _MAX_ رکورد)",
                lengthMenu: "_MENU_ تعداد نمایش رکوردها",
                search: "جستجوی پیشرفته:",
                zeroRecords: "رکوردی مطابق با عبارت جستجو شده توسط شما یافت نشد. "
            },
            bStateSave: !0,
            lengthMenu: [[5, 15, 20, -1], [5, 15, 20, "همه"]],
            pageLength: 5,
            pagingType: "bootstrap_full_number",
            columnDefs: [{orderable: !1, targets: [0]}, {searchable: !1, targets: [0]}, {className: "dt-right"}],
            order: [[1, "asc"]]
        });
        jQuery("#sample_3_wrapper");
        e.find(".group-checkable").change(function () {
            var e = jQuery(this).attr("data-set"), t = jQuery(this).is(":checked");
            jQuery(e).each(function () {
                t ? ($(this).prop("checked", !0), $(this).parents("tr").addClass("active")) : ($(this).prop("checked", !1), $(this).parents("tr").removeClass("active"))
            })
        }), e.on("change", "tbody tr .checkboxes", function () {
            $(this).parents("tr").toggleClass("active")
        })
    }, w = function () {
        var e = $("#sample_4");
        e.dataTable({
            language: {
                aria: {
                    sortAscending: "فعال برای مرتب سازی صعودی :",
                    sortDescending: "فعال برای مرتب سازی نزولی :"
                },
                emptyTable: "رکوردی وجود ندارد.",
                info: "نمایش _START_ تا _END_ رکورد از مجموع _TOTAL_ رکورد",
                infoEmpty: "هیچ رکوردی یافت نشد",
                infoFiltered: "(فیلتر شده از مجموع _MAX_ رکورد)",
                lengthMenu: "_MENU_ تعداد نمایش رکوردها",
                search: "جستجوی پیشرفته:",
                zeroRecords: "رکوردی مطابق با عبارت جستجو شده توسط شما یافت نشد. "
            },
            bStateSave: !0,
            lengthMenu: [[5, 15, 20, -1], [5, 15, 20, "همه"]],
            pageLength: 5,
            pagingType: "bootstrap_full_number",
            columnDefs: [{orderable: !1, targets: [0]}, {searchable: !1, targets: [0]}, {className: "dt-right"}],
            order: [[1, "asc"]]
        });
        jQuery("#sample_3_wrapper");
        e.find(".group-checkable").change(function () {
            var e = jQuery(this).attr("data-set"), t = jQuery(this).is(":checked");
            jQuery(e).each(function () {
                t ? ($(this).prop("checked", !0), $(this).parents("tr").addClass("active")) : ($(this).prop("checked", !1), $(this).parents("tr").removeClass("active"))
            })
        }), e.on("change", "tbody tr .checkboxes", function () {
            $(this).parents("tr").toggleClass("active")
        })
    }, z = function () {
        var e = $("#sample_5");
        e.dataTable({
            language: {
                aria: {
                    sortAscending: "فعال برای مرتب سازی صعودی :",
                    sortDescending: "فعال برای مرتب سازی نزولی :"
                },
                emptyTable: "رکوردی وجود ندارد.",
                info: "نمایش _START_ تا _END_ رکورد از مجموع _TOTAL_ رکورد",
                infoEmpty: "هیچ رکوردی یافت نشد",
                infoFiltered: "(فیلتر شده از مجموع _MAX_ رکورد)",
                lengthMenu: "_MENU_ تعداد نمایش رکوردها",
                search: "جستجوی پیشرفته:",
                zeroRecords: "رکوردی مطابق با عبارت جستجو شده توسط شما یافت نشد. "
            },
            bStateSave: !0,
            lengthMenu: [[5, 15, 20, -1], [5, 15, 20, "همه"]],
            pageLength: 5,
            pagingType: "bootstrap_full_number",
            columnDefs: [{orderable: !1, targets: [0]}, {searchable: !1, targets: [0]}, {className: "dt-right"}],
            order: [[1, "asc"]]
        });
        jQuery("#sample_3_wrapper");
        e.find(".group-checkable").change(function () {
            var e = jQuery(this).attr("data-set"), t = jQuery(this).is(":checked");
            jQuery(e).each(function () {
                t ? ($(this).prop("checked", !0), $(this).parents("tr").addClass("active")) : ($(this).prop("checked", !1), $(this).parents("tr").removeClass("active"))
            })
        }), e.on("change", "tbody tr .checkboxes", function () {
            $(this).parents("tr").toggleClass("active")
        })
    };
    return {
        init: function () {
            jQuery().dataTable && (e(), o(), n(), w() , z())
        }
    }
}();

TableDatatablesColreorder.init();
