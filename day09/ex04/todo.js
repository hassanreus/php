$('#ft_list button').on('click', function () {
    var value;
    if ((value = prompt('Enter a name to do list:'))) {
        if (value.length === 0)
            return;
        $.post('insert.php', {message: value}, function (data) {
            data = JSON.parse(data);
            var id = data.id;
            addTodo(value, id);
            initDelEvent();
        });
    }
});

function addTodo(value, id)
{
    $('#ft_list').prepend($('<div id="' + id + '">' + value + '</div>'));
}

function initDelEvent()
{
    $('#ft_list div').on('click', function () {
        var id = $(this).attr('id');
        $.post('delete.php', {id: id});
        $(this).remove();
    });
}

$.get('select.php', function (data) {
    data = JSON.parse(data);
    var list = data.list;
    for (var id in list)
        addTodo(list[id], id);
    initDelEvent();
});