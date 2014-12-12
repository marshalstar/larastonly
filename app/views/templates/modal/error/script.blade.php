$(".popup-with-zoom-anim").magnificPopup({
    modal: true,
    type: 'inline',

    fixedContentPos: true,
    fixedBgPos: true,

    overflowY: 'auto',

    closeBtnInside: true,
    preloader: false,

    midClick: true,
    removalDelay: 300,
    mainClass: 'my-mfp-zoom-in'
});

$(document).on('click', '.popup-modal-error', function (e) {
    e.preventDefault();
    $.magnificPopup.close();
});