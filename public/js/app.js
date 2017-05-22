$('.ui.checkbox').checkbox();
$('.ui.accordion').accordion();
$('.tabular.menu .item').tab();
$('#context1 .menu .item').tab({
    context: $('#context1')
});
$('#context2 .menu .item').tab({
    context: 'parent'
});
$('.special.cards .image').dimmer({
    on: 'hover'
});
$('.clear.example .button').on('click', function () {
    $('.clear.example .ui.dropdown').dropdown('clear');
});
$(document).ready(function () {
    $('.ui.dropdown').dropdown({ on: 'click' });
});
$('.clear.example .button').on('click', function () {
    $('.clear.example .ui.dropdown').dropdown('clear');
});
$('.ui.rating').rating();
$('.message .close').on('click', function () {
    $(this).closest('.message').transition('fade');
});
$('.special.cards .image').dimmer({
    on: 'hover'
});
$('.progress').progress();
$(window).scroll(function() {
    if ($(window).scrollTop() > $(window).height()) {
        $('#btnToTop').addClass('scrolled');
    }
    else {
        $('#btnToTop').removeClass('scrolled');
    }
});
$('#btnToTop').click(function(e) {
    $('html, body').animate({ scrollTop: 0 }, 500);
    e.preventDefault();
});