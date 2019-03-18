jQuery(document).ready(function ($) {
    var body = $('body');

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
            // tinymce.activeEditor.insertContent('<img alt="Smiley face" style="width: 100%; height: auto" src="' + image_url + '"/>');
            $('#tiva-favicon').val(image_url);
        });
        media_uploader.open();
    }

    function open_media_uploader_add_shSlide2() {

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
            $('#shSlide2').val(image_url);
        });
        media_uploader.open();
    }

    function open_media_uploader_add_shSlide3() {

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
            $('#shSlide3').val(image_url);
        });
        media_uploader.open();
    }

    function open_media_uploader_add_link_mostaghim() {

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
            $('.link-mostaghim').val(image_url);
        });
        media_uploader.open();
    }

    function open_media_uploader_add_link_komaki() {

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
            $('.link-komaki').val(image_url);
        });
        media_uploader.open();
    }

    function open_media_uploader_add_ads_banner() {

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
            $('.add_ads_banner').val(image_url);
        });
        media_uploader.open();
    }

    // start widget slider js code

    function open_media_uploader_slid1_image() {

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
            $('.slid1input').val(image_url);
        });
        media_uploader.open();
    } // Slid 1

    function open_media_uploader_slid2_image() {

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
            $('.slid2input').val(image_url);
        });
        media_uploader.open();
    } // Slid 2

    function open_media_uploader_slid3_image() {

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
            $('.slid3input').val(image_url);
        });
        media_uploader.open();
    } // Slid 3

    function open_media_uploader_slid4_image() {

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
            $('.slid4input').val(image_url);
        });
        media_uploader.open();
    } // Slid 4

    function open_media_uploader_slid5_image() {

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
            $('.slid5input').val(image_url);
        });
        media_uploader.open();
    } // Slid 5

    function open_media_uploader_slid6_image() {

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
            $('.slid6input').val(image_url);
        });
        media_uploader.open();
    } // Slid 6

    // end widget slider js code

    // start index woocommerce page layer img upload
    function open_media_uploader_layer1_cat_img_image() {

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
            $('.layer1-cat-img').val(image_url);
        });
        media_uploader.open();
    } // layer 1

    function open_media_uploader_layer2_cat_img_image() {

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
            // tinymce.activeEditor.insertContent('<img alt="Smiley face" style="width: 200%; height: auto" src="' + image_url + '"/>');
            $('.layer2-cat-img').val(image_url);
        });
        media_uploader.open();
    } // layer 2

    function open_media_uploader_layer3_cat_img_image() {

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
            // tinymce.activeEditor.insertContent('<img alt="Smiley face" style="width: 300%; height: auto" src="' + image_url + '"/>');
            $('.layer3-cat-img').val(image_url);
        });
        media_uploader.open();
    } // layer 3

    function open_media_uploader_layer4_cat_img_image() {

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
            // tinymce.activeEditor.insertContent('<img alt="Smiley face" style="width: 400%; height: auto" src="' + image_url + '"/>');
            $('.layer4-cat-img').val(image_url);
        });
        media_uploader.open();
    } // layer 4

    function open_media_uploader_layer5_cat_img_image() {

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
            // tinymce.activeEditor.insertContent('<img alt="Smiley face" style="width: 500%; height: auto" src="' + image_url + '"/>');
            $('.layer5-cat-img').val(image_url);
        });
        media_uploader.open();
    } // layer 5

    function open_media_uploader_layer6_cat_img_image() {

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
            // tinymce.activeEditor.insertContent('<img alt="Smiley face" style="width: 600%; height: auto" src="' + image_url + '"/>');
            $('.layer6-cat-img').val(image_url);
        });
        media_uploader.open();
    } // layer 6

    function open_media_uploader_layer7_cat_img_image() {

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
            // tinymce.activeEditor.insertContent('<img alt="Smiley face" style="width: 700%; height: auto" src="' + image_url + '"/>');
            $('.layer7-cat-img').val(image_url);
        });
        media_uploader.open();
    } // layer 7


    // end index woocommerce page layer img upload

    function open_media_uploader_add_link_img_cat_widget() {

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
            // tinymce.activeEditor.insertContent('<img alt="Smiley face" style="width: 200%; height: auto" src="' + image_url + '"/>');
            $('.img_cat_url').val(image_url);
        });
        media_uploader.open();
    }

    body.on('click', '.favicon-up', function (e) {
        e.preventDefault();
        open_media_uploader_add_favicon();
    });

    body.on('click', '.shSlide2', function (e) {
        e.preventDefault();
        open_media_uploader_add_shSlide2()
    });

    body.on('click', '.shSlide3', function (e) {
        e.preventDefault();
        open_media_uploader_add_shSlide3()
    });

    body.on('click', '.upload-link-mostaghim', function (e) {
        e.preventDefault();
        open_media_uploader_add_link_mostaghim();
    });

    body.on('click', '.upload-link-komaki', function (e) {
        e.preventDefault();
        open_media_uploader_add_link_komaki();
    });

    body.on('click', '.upload-ads-banner', function (e) {
        e.preventDefault();
        open_media_uploader_add_ads_banner();
    });

    body.on('click', '.img_cat_url_btn', function (e) {
        e.preventDefault();
        open_media_uploader_add_link_img_cat_widget();
    });

    // start widget slider js code
    body.on('click', '.slid1btn', function (e) {
        e.preventDefault();
        open_media_uploader_slid1_image();
    }); // slid 1

    body.on('click', '.slid2btn', function (e) {
        e.preventDefault();
        open_media_uploader_slid2_image();
    }); // slid 2

    body.on('click', '.slid3btn', function (e) {
        e.preventDefault();
        open_media_uploader_slid3_image();
    }); // slid 3

    body.on('click', '.slid4btn', function (e) {
        e.preventDefault();
        open_media_uploader_slid4_image();
    }); // slid 4

    body.on('click', '.slid5btn', function (e) {
        e.preventDefault();
        open_media_uploader_slid5_image();
    }); // slid 5

    body.on('click', '.slid6btn', function (e) {
        e.preventDefault();
        open_media_uploader_slid6_image();
    }); // slid 6

    // end widget slider js code

    // start index woocommerce page layer img upload
    body.on('click', '.layer1-cat-img', function (e) {
        e.preventDefault();
        open_media_uploader_layer1_cat_img_image(); // layer 1
    }); // layer 1

    body.on('click', '.layer2-cat-img', function (e) {
        e.preventDefault();
        open_media_uploader_layer2_cat_img_image(); // layer 2
    }); // layer 2

    body.on('click', '.layer3-cat-img', function (e) {
        e.preventDefault();
        open_media_uploader_layer3_cat_img_image(); // layer 3
    }); // layer 3

    body.on('click', '.layer4-cat-img', function (e) {
        e.preventDefault();
        open_media_uploader_layer4_cat_img_image(); // layer 4
    }); // layer 4

    body.on('click', '.layer5-cat-img', function (e) {
        e.preventDefault();
        open_media_uploader_layer5_cat_img_image(); // layer 5
    }); // layer 5

    body.on('click', '.layer6-cat-img', function (e) {
        e.preventDefault();
        open_media_uploader_layer6_cat_img_image(); // layer 6
    }); // layer 6

    body.on('click', '.layer7-cat-img', function (e) {
        e.preventDefault();
        open_media_uploader_layer7_cat_img_image(); // layer 7
    }); // layer 7

    // end index woocommerce page layer img upload

// ********************************   BEGIN TIVA V4 ADMIN JS CODE    **********************************
    //    begin tiva custom js code for select video
    $("input[name=tiva-video-select]").on("click", function () {
        if ($("#aparat").is(":checked")) {
            $(".custom-video").hide();
            $(".aparat-form").slideDown(800)

        } else if ($("#custom-video").is(":checked")) {
            $(".aparat-form").hide();
            $(".custom-video").slideDown(800)
        }
    });

    //     end tiva custom js code for select video


    function open_media_uploader_add_video_poster() {

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
            $('#video-poster').val(image_url);
        });
        media_uploader.open();
    }

    body.on('click', '#video-poster', function (e) {
        e.preventDefault();
        open_media_uploader_add_video_poster();
    });

    function open_media_uploader_add_up_video() {

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
            $('#up-video').val(image_url);
        });
        media_uploader.open();
    }

    body.on('click', '#up-video', function (e) {
        e.preventDefault();
        open_media_uploader_add_up_video();
    });

    function open_media_uploader_add_up_qrcode() {

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
            $('#qrcode_input').val(image_url);
        });
        media_uploader.open();
    }

    body.on('click', '.qrcode-up', function (e) {
        e.preventDefault();
        open_media_uploader_add_up_qrcode();
    });

// ********************************   END TIVA V4 ADMIN JS CODE    **********************************

});

