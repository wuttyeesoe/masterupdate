
function Check(t) {

    $(":checkbox").each(function () {
        if ($(":checked").length === $(":checkbox").length) {
            $(".next-btn").removeClass("hidden");
        } else {
            $(".next-btn").addClass("hidden");
        }

    });


}

$(":checkbox").change(function () {
    var value = $(this).attr('value');
    var isChecked = $(this).is(":checked") ? 1 : 0;

    $.ajax({
        type: 'POST',
        url: "../shop/check",
        data: {strID: value, checked_flag: isChecked}


    });

});


$(document).ready(function () {
    Check();
    $(":checkbox").click(function () {
        Check(this);
    });
});


$(document).ready(function () {
    $("#datepicker").datepicker({ minDate : 0 });
    $(".top").click(function () {

        $.ajax({
            type: 'POST',
            url: "../top/button",
            data: {id: $(this).attr('id'), value: $(this).attr('value')},
            cache: false

        });

    });
    $(".typetop").click(function () {

        $.ajax({
            type: 'POST',
            url: "../top/t_typetalk",
            data: {id: $(this).attr('id'), value: $(this).attr('value')},
            cache: false

        });

    });
    $(".product").click(function () {

        $.ajax({
            type: 'POST',
            url: "../product/button",
            data: {id: $(this).attr('id'), value: $(this).attr('value')},
            cache: false

        });

    });
    $(".typeproduct").click(function () {

        $.ajax({
            type: 'POST',
            url: "../product/p_typetalk",
            data: {id: $(this).attr('id'), value: $(this).attr('value')},
            cache: false

        });

    });
});
