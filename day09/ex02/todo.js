var j = 0;
var list = document.getElementById("ft_list");

window.onload = getCookie();

function setCookie(id, name, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = id + "=" + escape(name) + ";" + expires + ";path=/";
}

function getCookie() {
    if (document.cookie && document.cookie != "") {
        var saves = document.cookie.split(";");
        for (var i = 0; i < saves.length; i++) {
            var save = saves[i].split("=");
            var id = save[0].trim();
            var name = unescape(save[1]);
            var div = document.createElement("div");
            div.innerHTML = name;
            div.setAttribute("id", id);
            div.setAttribute("onclick", "list_del(id)");
            list.insertBefore(div, list.childNodes[0]);
        }
        j = id;
    }
}

function list_new()
{
    var name = prompt("Enter a name to do list:");
    if (name != null && name != "")
    {
        var div = document.createElement('div');
        div.innerHTML = name;
        var id = ++j;
        div.setAttribute("id", id);
        div.setAttribute("onclick", "list_del(id)");
        list.insertBefore(div,list.childNodes[0]);
        setCookie(id, name, 3000);
    }
}

function list_del(id) {
    if (confirm('You want delete this todo from list ?')) {
        var list = document.getElementById("ft_list");
        var item = document.getElementById(id);
        list.removeChild(item);
        document.cookie = id + "=;" + "expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    }
}