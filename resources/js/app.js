require('./bootstrap');

$(".clear-checkboxes").on("click", function(e) {
    e.stopPropagation();
    console.log($(this).parent().next().find('input[type=checkbox]'))
    $(this)
        .parent()
        .next()
        .find('input[type=checkbox]')
        .prop('checked', false);
});

$(".checkbox-title").on("click", function() {
    $(this).next().slideToggle();
    $(this).toggleClass("active");
    if ($(this).hasClass("active")) {
        $(this).find(".expander-symbol").text("-");
    } else {
        $(this).find(".expander-symbol").text("+");
    }
});