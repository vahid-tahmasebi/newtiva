function getSelectedContent(ed, str) {
    var selected = ed.selection.getContent({format: 'text'})
    var length = selected.length
    if (length <= 0) {
        return str;
    } else {
        return selected;
    }
}
(function () {
    tinymce.PluginManager.add('shortcodeSelector', function (ed, url) {
        ed.addButton('shortcodeSelector', {
            text: 'شورتکدها',
            icon: false,
            type: 'menubutton',
            menu: [{
                text: 'باکس موفقیت',
                onclick: function () {
                    ed.insertContent('[alert type="success"]' + getSelectedContent(ed, "متن باکس  موفقیت را وارد کنید.") + '[/alert]' + '<br>');
                }
            },
                {
                    text: 'باکس راهنما',
                    onclick: function () {
                        ed.insertContent('[alert type="info"]' + getSelectedContent(ed, "متن باکس  راهنما را وارد کنید.") + '[/alert]' + '<br>');
                    }
                },
                {
                    text: 'باکس هشدار هشدار',
                    onclick: function () {
                        ed.insertContent('[alert type="warning"]' + getSelectedContent(ed, "متن باکس  هشدار را وارد کنید.") + '[/alert]' + '<br>');
                    }
                }
                ,
                {
                    text: 'باکس هشدار اخطار',
                    onclick: function () {
                        ed.insertContent('[alert type="danger"]' + getSelectedContent(ed, "متن باکس  اخطار را وارد کنید.") + '[/alert]' + '<br>');
                    }
                }
                ,
                {
                    text: 'داغ ترین مقاله مرتبط',
                    onclick: function () {
                        ed.insertContent('[hot_posts]');
                    }
                }
                ,
                {
                    text: 'محتوای مخصوص اعضا',
                    onclick: function () {
                        ed.insertContent('[private_content]' + getSelectedContent(ed, "متن یا قسمتی از مقاله ای که مخصوص کاربران عضو شده است را وارد کنید") + '[/private_content]' + '<br>');

                    }
                }
            ]
        });
    });
})();