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