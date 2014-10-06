if (typeof url === 'undefined') {
    var url = '';
}

$(".destroy").click(function () {
    if (url) {
        $.ajax({
            url: url,
            type:'DELETE',
            success: function() {
                $("#grid-data").bootgrid("reload", null);
            },
            error: function() {
                /* @TODO: vim aqui e fazer uma modal descente */
                alert('opa! deu erro! voltar aqui e fazer uma modal decente!');
            }
        });
    }
});

$(".destroy-modal").click(function() {
    url = $(this).attr('data-url');
});

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

$(document).on('click', '.popup-modal-destroy', function (e) {
    e.preventDefault();
    $.magnificPopup.close();
});