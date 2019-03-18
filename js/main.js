jQuery(document).ready(function ($) {


    /*    var stop_DBclick = 0;2
     $.cookie('refresh', 'ok');
     $.cookie('dal', 'ok');
     alert($.cookie('click'));*/
    var stop_DBclick = 0;
    // $.cookie('click', 'ok');
    // alert($.cookie('click'));

    // alert($.cookie('click'));
    var body = $('body');

    // START AJAX POST FILTER
    jQuery(function ($) {

        $('#post-filter').submit(function () {
            $('.tiva-pagination').addClass('hidden');
            var filter = $('#post-filter');
            $.ajax({
                url: filter.attr('action'),
                data: filter.serialize(), // form data
                // dataType: 'json',
                type: filter.attr('method'), // POST
                beforeSend: function () {
                    $('header.switch-text-icon').html(' <h3><i class="fa fa fa-search" aria-hidden="true"></i>نتایج جست‌وجو شما</h3>');
                    $('#main-post-container ').addClass('ajax-wrapper-opacity');
                    $('.post-filter-btn').hide();
                    $('.ajax-loader').removeClass('hidden');
                },
                success: function (response) {
                    $('tiva-pagination').hide();
                    $('.post-filter-btn ').html('<i class="fa fa-search" aria-hidden="true" style="margin-left:2px "></i>');
                    filter.find('button').append('جستجو ');
                    $('.ajax-loader').addClass('hidden');
                    $('.post-filter-btn').show();
                    $('#main-post-container ').removeClass('ajax-wrapper-opacity');
                    $('#main-post-container').html(response); // insert data
                    // $('.test').html(data); // insert data
                }
            });
            return false;
        });
    });
    // END AJAX POST FILTER

    // START AJAX POST FILTER HAMYAR
    jQuery(function ($) {

        $('#h_post_filter').submit(function () {
            $('.tiva-pagination').addClass('hidden');
            var filter = $('#h_post_filter');
            $.ajax({
                url: filter.attr('action'),
                data: filter.serialize(), // form data
                // dataType: 'json',
                type: filter.attr('method'), // POST
                beforeSend: function () {
                    $('header.switch-text-icon').html(' <h3><i class="fa fa fa-search" aria-hidden="true"></i>نتایج جست‌وجو شما</h3>');
                    $('#main-post-container ').addClass('ajax-wrapper-opacity');
                    $('.post-filter-btn').hide();
                    $('.ajax-loader').removeClass('hidden');
                },
                success: function (response) {
                    $('tiva-pagination').hide();
                    $('.post-filter-btn ').html('<i class="fa fa-search" aria-hidden="true" style="margin-left:2px "></i>');
                    filter.find('button').append('جستجو ');
                    $('.ajax-loader').addClass('hidden');
                    $('.post-filter-btn').show();
                    $('#main-post-container ').removeClass('ajax-wrapper-opacity');
                    $('#main-post-container').html(response); // insert data
                    // $('.test').html(data); // insert data
                }
            });
            return false;
        });
    });
    // END AJAX POST FILTER HAMYAR

    // START AJAX author POST FILTER
    jQuery(function ($) {

        $('#author_post_filter').submit(function () {
            $('.tiva-pagination').addClass('hidden');
            var filter = $('#author_post_filter');
            $.ajax({
                url: filter.attr('action'),
                data: filter.serialize(), // form data
                // dataType: 'json',
                type: filter.attr('method'), // POST
                beforeSend: function () {
                    $('header.switch-text-icon').html(' <h3><i class="fa fa fa-search" aria-hidden="true"></i>نتایج جست‌وجو شما</h3>');
                    $('.tiva-pagination').hide();
                    $('#main-post-container ').addClass('ajax-wrapper-opacity');
                    $('.post-filter-btn').hide();
                    $('.ajax-loader').removeClass('hidden');
                },
                success: function (response) {
                    $('.post-filter-btn ').html('<i class="fa fa-search" aria-hidden="true" style="margin-left:2px "></i>');
                    filter.find('button').append('جستجو ');
                    $('.ajax-loader').addClass('hidden');
                    $('.post-filter-btn').show();
                    $('#main-post-container ').removeClass('ajax-wrapper-opacity');
                    $('#main-post-container').html(response); // insert data
                    // $('.test').html(data); // insert data
                }
            });
            return false;
        });
    });
    // END AJAX author POST FILTER

    // BEGIN OVERRIDE NOTIFICATION OPTION
    Lobibox.notify.DEFAULTS = $.extend({}, Lobibox.notify.DEFAULTS, {
        iconSource: "fontAwesome",
        soundPath: data.temp_patch + '/js/sounds/'
    });
    // END OVERRIDE NOTIFICATION OPTION


    // START LOAD MORE BTN AJAX
    body.on('click', '.load-more', function (event) {

        event.preventDefault();

        var $this = $(this);

        $this.text('در حال بارگذاری ...');

        var $page = parseInt($('#load-more-wrapper').data('page'));

        $.ajax({

            url: data.ajax_url,
            type: 'post',
            dataType: 'json',
            data: {
                action: 'load_more_content',
                page: $page
            },

            success: function (response) {

                if (response.content === "") {
                    $this.text('مقاله ای یافت نشد ');
                    $this.addClass('disabled');
                    $this.prop("disabled", true);
                }
                if (parseInt(response.count) === 1) {
                    $('#main-post-container').append(response.content);
                    var new_page = parseInt($page + 1);
                    $('#load-more-wrapper').data('page', new_page);
                }
                if (response.content === "") {
                    $this.text('مقاله ای یافت نشد ');
                } else
                    $this.text('مقاله های بیشتر');

            },
            error: function () {
                //   alert('ok');
            }

        });
    });
    // END LOAD MORE BTN AJAX

    // START SHOW MORD CONTENT BTN TOGGLE
    // $('[data-toggle="tooltip-copy-comment"]').tooltip();
    $('[data-toggle="tiva-comment-like-down-tooltip"]').tooltip();
    $('[data-toggle="favorite-star-btn"]').tooltip();
    $('[data-toggle="tiva-comment-like-up-tooltip"]').tooltip();
    $('[data-toggle="post-short-link"]').tooltip();
    $('[data-toggle="copy-post-short-link-btn"]').tooltip();
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="like-btn"]').tooltip();
    // END SHOW MORD CONTENT  BTN TOGGLE

    // START SHOW MORD CONTENT
    $(function show_more_content() {

        $('body').on('click', '.show-post-btn', function () {
            // alert('-');
            $('div.card-reveal[data-rel=' + $(this).data('rel') + ']').slideToggle(400);
            $('.ribbon[data-rel=' + $(this).data('rel') + ']').hide();
        });

        $('body ').on('click', '.card-reveal .close', function () {
            $('div.card-reveal[data-rel=' + $(this).data('rel') + ']').slideToggle(400);
            $('.ribbon[data-rel=' + $(this).data('rel') + ']').show();
        });
    });
    // END SHOW MORD CONTENT

    // START LIKE HEART BTN
    // $('body').on("click", '.heart', function () {
    //     // alert('qq');
    //     // var A=$(this).attr("id");
    //     // var B=A.split("like");
    //     // var messageID=B[1];
    //     // var C=parseInt($("#likeCount"+messageID).html());
    //     var $this = $(this);
    //     $(this).css("background-position", "");
    //     var D = $(this).attr("rel");
    //     var $post_id = $this.data("id");
    //     // alert($post_id);
    //     if (D === 'like') {
    //         // $("#likeCount"+messageID).html(C+1);
    //         $(this).addClass("heartAnimation").attr("rel", "unlike");
    //     }
    //     else {
    //         // $("#likeCount"+messageID).html(C-1);
    //         $(this).removeClass("heartAnimation").attr("rel", "like");
    //         $(this).css("background-position", "left");
    //     }
    //     $.ajax({
    //         url: data.ajax_url,
    //         type: 'post',
    //         dataType: 'json',
    //
    //         data: {
    //             action: 'tiva_do_like',
    //             post_id: $post_id
    //         },
    //         success: function (response) {
    //
    //         },
    //         error: function () {
    //
    //         }
    //     })
    //
    // });
    // END LIKE HEART BTN

    function change_to_farsi(nume) {
        // alert(nume);
        var numm = nume.toString();
        var num = new Array();
        for (var k = 0; k < numm.length; k++) num[k] = numm[k];
        var en = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
        var fa = ["۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹"];

        for (var i = 0; i < num.length; i++)
            for (var j = 0; j < 10; j++)
                if (num[i] === en[j]) {
                    num[i] = fa[j];
                    break;
                }
        var a = '';
        for (k = 0; k < num.length; k++) a += num[k];
        return a;
    }

    // BEGIN POST HEART AJAX LIKE
    body.on("click", '.heart', function () {

        var $this = $('.heart[data-id=' + $(this).data('id') + ']');
        var $count_placeholder = $('.like-meta[data-rel=' + $(this).data('id') + ']');
        var $post_id = $this.data('id');
        var rel = $this.attr("rel");
        $(this).css("background-position", "");


        if (rel === 'like') {
            $this.removeClass("heart-left");
            $this.addClass("heartAnimation");
            $.ajax({
                url: data.ajax_url,
                type: 'post',
                dataType: 'json',
                data: {
                    action: 'tiva_do_like',
                    post_id: $post_id
                },
                success: function (response) {
                    $count_placeholder.html('<i class="fa fa-heart" aria-hidden="true" style="margin-left:3px "></i>');
                    $count_placeholder.append(response.new_count);
                    return false;
                },

                error: function () {

                }

            });
            $this.attr("rel", "unlike");

        }
        else if (rel === 'unlike') {

            $this.removeClass("heartAnimation");
            $this.addClass("heart-left");
            $(this).css("background-position", "");
            $.ajax({
                url: data.ajax_url,
                type: 'post',
                dataType: 'json',
                data: {
                    action: 'tiva_do_dislike',
                    post_id: $post_id
                },
                success: function (response) {
                    $count_placeholder.html('<i class="fa fa-heart" aria-hidden="true" style="margin-left:3px "></i>');
                    $count_placeholder.append(response.new_count);
                    return false
                },

                error: function () {

                }

            });

            $this.attr("rel", "like");


        }

    });
    // END POST HEART AJAX LIKE

    // BEGIN COMMENT  AJAX LIKE UP AND DISLIKE UP
    body.on('click', '.tiva-comment-like-up', function (event) {
        stop_DBclick++;
        event.preventDefault();
        var $this = $(this);
        var rel_like_up = $this.hasClass('no-comment-liked-up');
        var like_down = $('.tiva-comment-like-down[data-rel=' + $(this).data('id') + ']');
        var rel_like_down = like_down.hasClass('comment-liked-down');
        $count_placeholder_like_up = $('.comment-like-up-cunt[data-rel=' + $(this).data('id') + ']');
        $count_placeholder_like_down = $('.comment-like-down-cunt[data-rel=' + $(this).data('id') + ']');
        var $ajax_loader_img = $('.ajax-loader-comment-like-up[data-rel=' + $(this).data('id') + ']');
        var $ajax_loader_img_down = $('.ajax-loader-comment-like-down[data-rel=' + $(this).data('id') + ']');
        var $like_down_plus = $('.like-down-plus[data-rel=' + $(this).data('id') + ']');
        var $like_up_plus = $('.like-up-plus[data-rel=' + $(this).data('id') + ']');
        var $comment_id = $this.data('id');
        if ((stop_DBclick >= 2) || ($.cookie('name') === 'ok')) {
            stop_DBclick = 1;
            // sweetAlert("مردک مشنگ اروم", "هووووی آروم کلیک بکن", "error");
            swal({
                title: 'اخطار',
                text: "کاربر عزیز شما مجاز به دادن یک رای هستید.",
                type: 'error',
                showConfirmButton: true,
                confirmButtonText: 'باشه ، چشم !'
            });
            return;
        }

        if (rel_like_up === true && rel_like_down === true) {
            $('[data-toggle="tiva-comment-like-up-tooltip"]').tooltip('hide');
            $count_placeholder_like_up.text('');
            $count_placeholder_like_down.text('');
            $like_down_plus.text('');
            $like_up_plus.text('');
            $ajax_loader_img.removeClass('hidden');
            $ajax_loader_img_down.removeClass('hidden');

            $.ajax({
                url: data.ajax_url,
                type: 'post',
                dataType: 'json',
                data: {
                    action: 'tiva_comment_like_up_plus_like_down_minus',
                    comment_id: $comment_id
                },
                success: function (response) {
                    stop_DBclick = 0;
                    var $new_count_up = response.new_count_like_up;
                    var $new_count_down = response.new_count_like_down;
                    $ajax_loader_img.addClass('hidden');
                    if ($new_count_up > 0) {
                        $like_up_plus.text('+');
                    }
                    $count_placeholder_like_up.text(change_to_farsi($new_count_up));
                    $ajax_loader_img_down.addClass('hidden');
                    if ($new_count_down > 0) {
                        $like_down_plus.text('-');
                    }
                    $count_placeholder_like_down.text(change_to_farsi($new_count_down));
                    $this.removeClass('no-comment-liked-up').addClass('comment-liked-up');
                    like_down.removeClass('comment-liked-down').addClass('no-comment-liked-down');
                    $.cookie('click', 'null');
                },
                error: function () {

                }

            });

        }

        else if (rel_like_up === true) {
            $('[data-toggle="tiva-comment-like-down-tooltip"]').tooltip('hide');
            $count_placeholder_like_up.text('');
            $like_up_plus.text('');
            $ajax_loader_img.removeClass('hidden');

            $.ajax({
                url: data.ajax_url,
                type: 'post',
                dataType: 'json',
                data: {
                    action: 'tiva_comment_do_like_up',
                    comment_id: $comment_id
                },
                success: function (response) {
                    stop_DBclick = 0;
                    var $new_count = response.new_count;
                    $count_placeholder_like_up.text(change_to_farsi($new_count));
                    $like_up_plus.text('+');
                    $ajax_loader_img.addClass('hidden');
                    $this.removeClass('no-comment-liked-up').addClass('comment-liked-up');
                    $.cookie('click', 'null');


                },

                error: function () {

                }

            });
        }


        else if (rel_like_up === false) {
            $('[data-toggle="tiva-comment-like-up-tooltip"]').tooltip('hide');
            $count_placeholder_like_up.text('');
            $like_up_plus.text('');
            $ajax_loader_img.removeClass('hidden');
            $.ajax({
                url: data.ajax_url,
                type: 'post',
                dataType: 'json',
                data: {
                    action: 'tiva_comment_do_dislike_up',
                    comment_id: $comment_id
                },

                success: function (response) {
                    var $new_count = response.new_count;
                    stop_DBclick = 0;
                    if ($new_count > 0) {
                        $like_up_plus.text('+');
                    }
                    $count_placeholder_like_up.text(change_to_farsi($new_count));
                    $ajax_loader_img.addClass('hidden');
                    $this.addClass('no-comment-liked-up').removeClass('comment-liked-up');
                    $.cookie('click', 'null');

                },

                error: function () {

                }

            });

        }

    });
    // END COMMENT    AJAX LIKE UP AND DISLIKE UP


    // BEGIN COMMENT  AJAX LIKE DOWN AND DISLIKE DOWN
    body.on('click', '.tiva-comment-like-down', function (event) {

        event.preventDefault();
        var $this = $(this);
        var rel = $this.hasClass('no-comment-liked-down');
        var rel_like_down = $this.hasClass('no-comment-liked-down');
        var like_up = $('.tiva-comment-like-up[data-rel=' + $(this).data('id') + ']');
        var rel_like_up = like_up.hasClass('comment-liked-up');
        $count_placeholder_like_up = $('.comment-like-up-cunt[data-rel=' + $(this).data('id') + ']');
        $count_placeholder_like_down = $('.comment-like-down-cunt[data-rel=' + $(this).data('id') + ']');
        var $ajax_loader_img = $('.ajax-loader-comment-like-down[data-rel=' + $(this).data('id') + ']');
        var $ajax_loader_img_up = $('.ajax-loader-comment-like-up[data-rel=' + $(this).data('id') + ']');
        var $like_down_plus = $('.like-down-plus[data-rel=' + $(this).data('id') + ']');
        var $like_up_plus = $('.like-up-plus[data-rel=' + $(this).data('id') + ']');
        var $comment_id = $this.data('id');

        stop_DBclick++;
        if ((stop_DBclick >= 2) || ($.cookie('name') === 'ok')) {
            stop_DBclick = 1;
            // sweetAlert("مردک مشنگ اروم", "هووووی آروم کلیک بکن", "error");
            swal({
                title: 'اخطار',
                text: "کاربر عزیز شما مجاز به دادن یک رای هستید.",
                type: 'error',
                showConfirmButton: true,
                confirmButtonText: 'باشه ، چشم !'
            });
            return;
        }

        if (rel_like_down === true && rel_like_up === true) {
            $('[data-toggle="tiva-comment-like-down-tooltip"]').tooltip('hide');
            $count_placeholder_like_up.text('');
            $count_placeholder_like_down.text('');
            $like_down_plus.text('');
            $like_up_plus.text('');
            $ajax_loader_img.removeClass('hidden');
            $ajax_loader_img_up.removeClass('hidden');
            $.ajax({
                url: data.ajax_url,
                type: 'post',
                dataType: 'json',
                data: {
                    action: 'tiva_comment_like_down_plus_like_up_minus',
                    comment_id: $comment_id
                },
                success: function (response) {
                    stop_DBclick = 0;
                    var $new_count_up = response.new_count_like_up;
                    var $new_count_down = response.new_count_like_down;
                    $ajax_loader_img.addClass('hidden');
                    $count_placeholder_like_down.text(change_to_farsi($new_count_down));
                    if ($new_count_down > 0) {
                        $like_down_plus.text('-');
                    }
                    $ajax_loader_img_up.addClass('hidden');
                    $count_placeholder_like_up.text(change_to_farsi($new_count_up));
                    if ($new_count_up > 0) {
                        $like_up_plus.text('+');
                    }
                    $this.removeClass('no-comment-liked-down').addClass('comment-liked-down');
                    like_up.removeClass('comment-liked-up').addClass('no-comment-liked-up');
                    $.cookie('click', 'null');
                },

                error: function () {

                }

            });

        }
        else if (rel === true) {
            $('[data-toggle="tiva-comment-like-down-tooltip"]').tooltip('hide');
            $count_placeholder_like_down.text('');
            $like_down_plus.text('');
            $ajax_loader_img.removeClass('hidden');

            $.ajax({
                url: data.ajax_url,
                type: 'post',
                dataType: 'json',
                data: {
                    action: 'tiva_comment_do_like_down',
                    comment_id: $comment_id
                },
                success: function (response) {
                    stop_DBclick = 0;
                    var $new_count = response.new_count;
                    $count_placeholder_like_down.text(change_to_farsi($new_count));
                    $ajax_loader_img.addClass('hidden');
                    $like_down_plus.text('-');
                    $this.removeClass('no-comment-liked-down').addClass('comment-liked-down');
                    $.cookie('click', 'null');
                },

                error: function () {

                }

            });
        }
        else if (rel === false) {
            $('[data-toggle="tiva-comment-like-down-tooltip"]').tooltip('hide');
            $count_placeholder_like_down.text('');
            $ajax_loader_img.removeClass('hidden');
            $like_down_plus.text('');


            $.ajax({
                url: data.ajax_url,
                type: 'post',
                dataType: 'json',
                data: {
                    action: 'tiva_comment_do_dislike_down',
                    comment_id: $comment_id
                },
                success: function (response) {
                    stop_DBclick = 0;
                    var $new_count = response.new_count;
                    $count_placeholder_like_down.text(change_to_farsi($new_count));
                    $ajax_loader_img.addClass('hidden');
                    if ($new_count > 0) {
                        $like_down_plus.text('-');
                    }
                    $this.addClass('no-comment-liked-down').removeClass('comment-liked-down');
                    stop_DBclick = 0;
                },

                error: function () {

                }

            });
        }


    });
    // END COMMENT   AJAX LIKE DOWN AND DISLIKE DOWN

    // BEGIN COMMENT SLOW ANIMATION
    $(".comments-link").click(function (event) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: $("#comments").offset().top
        }, 1500);
    });
    // END COMMENT SLOW ANIMATION


    // BEGIN USER PASSWORD REST AJAX
    body.on('click', '.form-rest-btn', function (event) {
        event.preventDefault();
        var $this = $(this);
        var user_email = $('.user-email').val();
        var msg_span = $('.msg-box');
        var alert_box_error = $('.alert-box-error');
        var alert_box_suc = $('.alert-box-suc');
        var alert_box = $('.alert_box');
        alert_box_error.slideUp();
        alert_box_suc.slideUp();
        if (user_email === "") {
            alert_box_error.removeClass('hidden');
            msg_span.text('لطفا ایمیل خود را وارد کنید');
            alert_box_error.slideDown();
            return false
        }


        $this.val('صبر کنید ...');
        $this.addClass('btn disabled');
        $this.prop("disabled", true);
        $.ajax({
            url: data.ajax_url,
            type: 'post',
            dataType: 'json',
            data: {
                action: 'tiva_user_pass_rest',
                user_email: user_email
            },
            success: function (response) {
                if (response.error) {

                    msg_span.text(response.error);
                    alert_box_error.removeClass('hidden').slideDown();
                    $this.removeClass('btn disabled');
                    $this.prop("disabled", false);
                    $this.val('دریافت رمز عبور');
                    return false
                } else if (response.success) {
                    msg_span.text(response.success);
                    alert_box_suc.removeClass('hidden').slideDown();
                    $this.removeClass('btn disabled');
                    $this.prop("disabled", false);
                    $this.val('دریافت رمز عبور');

                    return false
                }


            },

            error: function () {
                msg_span.text(response.error);
                alert_box_error.removeClass('hidden').slideDown();
            }

        });

    });
    // END USER PASSWORD REST AJAX

    // BEGIN USER LOGIN AJAX HOME
    $("#password").keypress(function () {
        $('.password-strong').removeClass('hidden').slideDown(500);
    });
    // END USER LOGIN REST AJAX HOME

    // BEGIN REGISTER FORM SHOW AND HIDE PASSWORD
    body.on('click', '.pass-show', function (event) {
        event.preventDefault();
        var pass_show = $('.pass-show');
        if (pass_show.attr('data-rel') === 'show') {
            $("#password").attr('type', 'text');
            pass_show.attr('data-rel', 'hied');
            pass_show.removeClass('fa-eye').addClass('fa-eye-slash')
        } else if (pass_show.attr('data-rel') === 'hied') {
            $("#password").attr('type', 'password');
            pass_show.attr('data-rel', 'show');
            pass_show.removeClass('fa-eye-slash').addClass('fa-eye')
        }

    });
    body.on('click', '.pass-confirm-show', function (event) {
        event.preventDefault();
        var pass_show = $('.pass-confirm-show');
        if (pass_show.attr('data-rel') === 'show') {
            $("#password-confirmation").attr('type', 'text');
            pass_show.attr('data-rel', 'hied');
            pass_show.removeClass('fa-eye').addClass('fa-eye-slash')
        } else if (pass_show.attr('data-rel') === 'hied') {
            $("#password-confirmation").attr('type', 'password');
            pass_show.attr('data-rel', 'show');
            pass_show.removeClass('fa-eye-slash').addClass('fa-eye')
        }

    });
    // END REGISTER FORM SHOW AND HIDE PASSWORD

    // BEGIN TIVA THEME REGISTRATION FORM
    body.on('click', '.tiva_register-form', function (event) {
        event.preventDefault();
        var $this = $(this);
        var userName = $('#userName').val();
        var name = $('#name').val();
        var family = $('#family').val();
        var webSite = $('#webSite').val();
        var tel = $('#tel').val();
        var user_email = $('#user_email').val();
        var password = $('#password').val();
        var password_confirmation = $('#password-confirmation').val();
        var msg_span = $('.msg-box');
        var alert_box_error = $('.alert-box-error');
        var alert_box_suc = $('.alert-box-suc');
        var alert_box = $('.alert_box');
        alert_box_error.slideUp();
        alert_box_suc.slideUp();

        if (userName.length === 0 || password.length === 0 || password_confirmation.length === 0 || user_email.length === 0) {
            // alert('kk');
            alert_box_error.removeClass('hidden');
            msg_span.text('لطفا فیلد های اجباری را پر کنید ');
            alert_box_error.slideDown();
            return
        }
        if (!$('.term').attr('checked')) {
            alert_box_error.removeClass('hidden');
            msg_span.text('لطفا تیک قوانین و مقررات سایت را بزنید ');
            alert_box_error.slideDown();
            return
        }
        var $_nonce = $('meta[name="_nonce"]').attr('content');
        $this.val('صبر کنید ...');
        $this.addClass('btn disabled');
        $this.prop("disabled", true);
        $.ajax({
            url: data.ajax_url,
            type: 'post',
            dataType: 'json',
            data: {
                action: 'tiva_user_register',
                username: userName,
                name: name,
                family: family,
                web_site: webSite,
                tel: tel,
                user_email: user_email,
                password: password,
                password_confirmation: password_confirmation,
                _nonce: $_nonce,
            },
            success: function (response) {
                if (response.error) {
                    // alert('error');
                    msg_span.text(response.message);
                    alert_box_error.removeClass('hidden').slideDown();
                    $this.removeClass('btn disabled');
                    $this.prop("disabled", false);
                    $this.val('عضویت در سایت');
                    return false
                } else if (response.success) {
                    // alert(response.redirect_url);
                    +msg_span.text(response.message);
                    alert_box_suc.removeClass('hidden').slideDown();
                    $this.removeClass('btn disabled');
                    $this.prop("disabled", false);
                    $this.val('عضویت در سایت');
                    // window.location.href = response.redirect_url;
                    return false
                }
            },
            error: function () {
                msg_span.text(response.error);
                alert_box_error.removeClass('hidden').slideDown();
            }
        });
        alert_box_error.slideUp(300);
        alert_box_suc.slideUp(300);
    });
    // END TIVA THEME REGISTRATION FORM

    // BEGIN COMMENT LINK COPY TO CLIPBOARD
    body.on('click', '.comment-link-btn', function () {

        var clipboard = new Clipboard('.comment-link-btn');
        var comment_id = $(this).data('id');


        clipboard.on('success', function (e) {
            console.log(e);
        });
        $(this).attr('data-original-title', 'کپی شد');
        $(this).attr('title', '');
        clipboard.on('error', function (e) {
            console.log(e);
        });
        $('[data-toggle="tooltip-copy-comment' + comment_id + '"]').tooltip('show');
        $(this).attr('data-original-title', 'لینک دیدگاه شما');
    });
    body.on('mouseover', '.comment-link-btn', function () {
        var comment_id = $(this).data('id');
        $('[data-toggle="tooltip-copy-comment' + comment_id + '"]').tooltip();
    });
    // END COMMENT LINK COPY TO CLIPBOARD

    // BEGIN COPY POST SHORT LINK
    body.on('click', '.copy-post-short-link', function () {

        var clipboard = new Clipboard('.copy-post-short-link');

        clipboard.on('success', function (e) {
            console.log(e);
        });
        $(this).attr('data-original-title', 'کپی شد');
        // $(this).attr('data-original-title', '');
        clipboard.on('error', function (e) {
            console.log(e);
        });
        $('[data-toggle="copy-post-short-link-btn"]').tooltip('show');
        // $('[data-toggle="copy-post-short-link-btn"] ').tooltip('hide');
        $(this).attr('data-original-title', '');
    });
    // END COPY POST SHORT LINK



    // BEGIN USER ADD POST FAVORITE
    body.on('click', '.star', function () {
        // alert('ok');
        if (data.current_user_id === '0') {
            return
        }
        var star = $(".star");
        var $post_id = star.data('id');
        var $user_id = star.data('user');

        if (star.hasClass("starred")) {
            Lobibox.notify('warning',
                {
                    title: false,
                    width: 420,
                    msg: 'شما این مقاله را قبلا به علاقه مندی ها اضافه کرده اید',
                    showClass: 'bounceIn',
                    hideClass: 'bounceOut',
                    position: 'top right',
                    delay: 3000
                });
            return
        } else if (star.hasClass("unstarred")) {
            star.removeClass("unstarred");
            star.addClass("starred");
        } else {
            star.addClass("starred");
        }

        $.ajax({
            url: data.ajax_url,
            type: 'post',
            dataType: 'json',
            data: {
                action: 'tiva_user_post_favorite',
                post_id: $post_id,
                user_id: $user_id
            },
            success: function (response) {
                var msg = response.msg;
                var error = response.error;
                if (error === false) {
                    Lobibox.notify('success', {
                        title: false,
                        width: 570,
                        msg: msg,
                        position: 'top right',
                        delay: 3000
                    });
                    $('.favorite-star-btn').attr('data-original-title', 'ذخیره شده در علاقمندی ها')
                } else if (error === true) {
                    Lobibox.notify('warning', {
                        title: false,
                        width: 420,
                        msg: msg,
                        position: 'top right',
                        delay: 3000
                    });
                }
            },

            error: function () {

            }

        });

    });
    // END USER ADD POST FAVORITE

    //Check to see if the window is top if not then display button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });

    //Click event to scroll to top
    $('.scrollToTop').click(function () {
        $('html, body').animate({scrollTop: 0}, 800);
        return false;
    });

    new WOW().init();

    $('.main-slider').slick({
        dots: true,
        rtl: true,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 2000,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 2,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });


    $('.hamyar-main-slider').slick({
        // dots: true,
        rtl: true,
        autoplay: true,
        arrows: false,
        autoplaySpeed: 2800,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });


    $('.product-slider').slick({
        dots: true,
        rtl: true,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 3000,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 2,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });


    function open_media_uploader_add_favicon() {

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

    body.on('click', '.favicon-up', function (e) {
        e.preventDefault();
        open_media_uploader_add_favicon();
    });

    // tiva set download count
    $(document).on('click', '.download_file', function (event) {
        event.preventDefault();
        var $this = $(this);
        var $pid = $this.data('id');
        $.ajax({
            url: data.ajax_url,
            type: 'post',
            //async:false,
            data: {
                action: 'sl_download_file_counter',
                pid: $pid
            },
            success: function (response) {
                window.location.href = $this.attr('href');
            },
            error: function () {
            }

        });

    });

    $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function (event) {
        event.preventDefault();
        event.stopPropagation();
        $(this).parent().siblings().removeClass('open');
        $(this).parent().toggleClass('open');
    });

    // begin tiva v3 js code
    $('div.noti-wrapper').slideDown(600);

    body.on('click', '.noti-close', function (event) {
        event.preventDefault();
        $.cookie('tiva_noti_close', 'true', {expires: 1});
        $('div.noti-wrapper').slideUp(600);
    });

    $('.tiva-slider-widget').slick({
        // dots: true,
        rtl: true,
        autoplay: true,
        arrows: false,
        autoplaySpeed: 1800,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });

    // end tiva v3 js code

    const player = new Plyr('#tiva-player');

    // add in tiva v5.5
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

    /**
     * NAME: Bootstrap 3 Triple Nested Sub-Menus
     * This script will active Triple level multi drop-down menus in Bootstrap 3.*
     */
    $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function (event) {
        // Avoid following the href location when clicking
        event.preventDefault();
        // Avoid having the menu to close when clicking
        event.stopPropagation();
        // Re-add .open to parent sub-menu item
        $(this).parent().addClass('open');
        $(this).parent().find("ul").parent().find("li.dropdown").addClass('open');
    });

    // ADD IN TIVA 5.8.1
    // BEGIN POST FORMAT GALLERY
    $('li.gallery-item a').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true,
            preload: [0, 2], // read about this option in next Lazy-loading section

            navigateByImgClick: true,

            arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>', // markup of an arrow button

            tPrev: 'Previous (Left arrow key)', // title for left button
            tNext: 'Next (Right arrow key)', // title for right button
            tCounter: '<span class="mfp-counter">%curr% of %total%</span>' // markup of counter
        },
        zoom: {
            enabled: true, // By default it's false, so don't forget to enable it

            duration: 300, // duration of the effect, in milliseconds
            easing: 'ease-in-out' // CSS transition easing function
        }
    });
    // END POST FORMAT GALLERY

    // BEGIN POST FORMAT GALLERY
    $('.gallery-item a').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true,
            preload: [0, 2], // read about this option in next Lazy-loading section

            navigateByImgClick: true,

            arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>', // markup of an arrow button

            tPrev: 'Previous (Left arrow key)', // title for left button
            tNext: 'Next (Right arrow key)', // title for right button
            tCounter: '<span class="mfp-counter">%curr% of %total%</span>' // markup of counter
        },
        zoom: {
            enabled: true, // By default it's false, so don't forget to enable it

            duration: 300, // duration of the effect, in milliseconds
            easing: 'ease-in-out' // CSS transition easing function
        }
    });
    // END POST FORMAT GALLERY

});

