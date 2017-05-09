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
var content = [
    { title: 'Andorra' },
    { title: 'United Arab Emirates' },
    { title: 'Afghanistan' },
    { title: 'Antigua' },
    { title: 'Anguilla' },
    { title: 'Albania' },
    { title: 'Armenia' },
    { title: 'Netherlands Antilles' },
    { title: 'Angola' },
    { title: 'Argentina' },
    { title: 'American Samoa' },
    { title: 'Austria' },
    { title: 'Australia' },
    { title: 'Aruba' },
    { title: 'Aland Islands' },
    { title: 'Azerbaijan' },
    { title: 'Bosnia' },
    { title: 'Barbados' },
    { title: 'Bangladesh' },
    { title: 'Belgium' },
    { title: 'Burkina Faso' },
    { title: 'Bulgaria' },
    { title: 'Bahrain' },
    { title: 'Burundi' }
];
