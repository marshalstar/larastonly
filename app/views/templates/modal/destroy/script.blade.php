
if (typeof id == 'undefined') {
    var id = '';
}
if (typeof url == 'undefined') {
    var url;
}

$(document).on('click', '.destroy', function () {

    if (!id || !url) {
        return;
    }

    $.ajax({
        url: url,
        type:'DELETE'
    }); {{-- @TODO: mostrar erro se necessario --}}
    {{--window.location.reload() se der certo--}}
    {{--$('#line'+id).remove(); se der certo--}}
});

$(".destroy-modal").click(function() {
    id = $(this).attr('data-id');
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