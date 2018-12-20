function ShowAddForm() {
    $('#hidden_form').removeClass('hide');
    console.log('test');
}

function HideAddForm() {
    $('#hidden_form').addClass('hide');
}

$(document).on('click', '.f_delete', function () {
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
        $(this).css({
            'background-color': 'green',
            color: 'black'
        });
    } else {
        console.log('Delete');
        $(this).text('Delete');
        $(this).css({
            'background-color': 'red',
            color: '#ddd'
        });
    }
});

function UserFilter(select) {
    $('#staff_list').addClass('hide');
    $('#member_list').addClass('hide');
    $('#all_filter').removeClass('selected');
    $('#staff_filter').removeClass('selected');
    $('#customer_filter').removeClass('selected');
    if (select == 0) {
        $('#all_filter').addClass('selected');
        $('#staff_list').removeClass('hide');
        $('#member_list').removeClass('hide');
    } else if (select == 1) {
        $('#staff_filter').addClass('selected');
        $('#staff_list').removeClass('hide');
    } else if (select == 2) {
        $('#customer_filter').addClass('selected');
        $('#member_list').removeClass('hide');
    }
}