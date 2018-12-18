function ShowAddForm() {
    $('#hidden_form').removeClass('hide');
    console.log('test');
}

function HideAddForm() {
    $('#hidden_form').addClass('hide');
}

$(document).on('click', '.f_delete', function() {
    $(this)
        .parent()
        .toggleClass('active');
    if (
        $(this)
            .parent()
            .hasClass('active')
    ) {
        console.log('test');
        $(this).text('Cancel');
        $(this).css({ 'background-color': 'green', color: 'black' });
    } else {
        console.log('Delete');
        $(this).text('Delete');
        $(this).css({ 'background-color': 'red', color: '#ddd' });
    }
});
