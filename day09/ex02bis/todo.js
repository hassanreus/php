var j = 0;
var list = $('#ft_list')[0];

function setCookie(id, name, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = id + "=" + escape(name) + ";" + expires + ";path=/";
}

function getCookie() {
    if (document.cookie && document.cookie != "") {
        var saves = document.cookie.split(";");
        $.each(saves, function (index, value) {
            var save = value.split("=");
            var id = $.trim(save[0]);
            var name = unescape(save[1]);
            $('<div/>', {
                id: id,
                text: name,
                onclick: "list_del(id)"
            }).insertAfter(list);
            j = id;
        });
    }
}

function list_new() {
    var name = prompt("Enter a name to do list:");
    if (name != null && name != "") {
        var id = ++j;
        $('<div/>', {
            id: id,
            text: name,
            onclick: "list_del(id)"
        }).insertAfter(list);
        setCookie(id, name, 3000);
    }
}

function list_del(id) {
    if (confirm('You want delete this todo from list ?')) {
        var item = $(`#${id}`)[0];
        item.remove();
        document.cookie = id + "=;" + "expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    }
}