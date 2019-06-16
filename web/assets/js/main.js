/*** Back to top button display ***/

$(window).scroll(function () {

    if ($(this).scrollTop() > 200) {
        $('#backToTop').fadeIn();
    } else {
        $('#backToTop').fadeOut();
    }

});

/*** Click event scroll to top button jQuery ***/

$('#backToTop').click(function () {
    $('html, body').animate({scrollTop : 0}, 600);
});

/*** Initialization of the date picker ***/

$(document).ready(function () {
    $('.js-datepicker').datepicker( {
        language: 'fr',
        format: 'yyyy-mm-dd',
        autoclose: true,
        startDate: '1800-01-01',
        endDate: '1949-12-31'
    });
});

$.fn.datepicker.dates['fr'] = {
    days: ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'],
    daysShort: ['lun', 'mar', 'mer', 'jeu', 'ven', 'sam', 'dim'],
    daysMin: ['lu', 'ma', 'me', 'je', 've', 'sa', 'di'],
    months: ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'],
    monthsShort: ['janv', 'févr', 'mars', 'avril', 'mai', 'juin', 'juil', 'août', 'sept', 'oct', 'nov', 'déc']
};