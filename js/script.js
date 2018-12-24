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
        $(this).css({
            'background-color': 'green',
            color: 'white'
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

function OrderFilter(select) {
    $('#process_list').addClass('hide');
    $('#confirm_list').addClass('hide');
    $('#finish_list').addClass('hide');

    $('#all_filter').removeClass('selected');
    $('#process_filter').removeClass('selected');
    $('#confirm_filter').removeClass('selected');
    $('#finish_filter').removeClass('selected');

    if (select == 0) {
        $('#all_filter').addClass('selected');
        $('#process_list').removeClass('hide');
        $('#confirm_list').removeClass('hide');
        $('#finish_list').removeClass('hide');
    } else if (select == 1) {
        $('#process_filter').addClass('selected');
        $('#process_list').removeClass('hide');
    } else if (select == 2) {
        $('#confirm_filter').addClass('selected');
        $('#confirm_list').removeClass('hide');
    } else if (select == 3) {
        $('#finish_filter').addClass('selected');
        $('#finish_list').removeClass('hide');
    }
}

function CountChildHeigh() {
    var childNumber = $('.item1_child').length;
    childNumber = childNumber * 27;
    $('head').append('<style>.list li:hover .item1 { height: ' + childNumber + ';}</style>');
    childNumber = $('.item3_child').length;
    childNumber = childNumber * 27;
    $('head').append('<style>.list li:hover .item3 { height: ' + childNumber + ';}</style>');
}
