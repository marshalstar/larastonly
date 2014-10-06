<div id="destroy-dialog" class="modal-content zoom-anim-dialog mfp-hide" aria-labelledby="titleDestroy" aria-hidden="true">
    <button type="button" class="close popup-modal-destroy" data-dismiss="modal">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>

    <h4 class="modal-title" id="titleDestroy">Deletar</h4>

    <div class="modal-body">
        {{ Lang::get('Tem certeza que deseja deletar?') }}
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default popup-modal-destroy" data-dismiss="modal">{{ Lang::get('Fechar') }}</button>
        <a href="javascript:void(0);" class="btn btn-sm btn-danger popup-modal-destroy destroy">
            {{ Lang::get('deletar') }}
        </a>
    </div>

</div>

{{-- http://dimsemenov.com/plugins/magnific-popup/documentation.html --}}
<style type="text/css">

    #destroy-dialog {
        background: white;
        padding: 20px 30px;
        text-align: left;
        max-width: 400px;
        margin: 40px auto;
        position: relative;
    }

    .my-mfp-zoom-in .zoom-anim-dialog {
        opacity: 0;

        -webkit-transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out;
        transition: all 0.2s ease-in-out;



        -webkit-transform: scale(0.8);
        -moz-transform: scale(0.8);
        -ms-transform: scale(0.8);
        -o-transform: scale(0.8);
        transform: scale(0.8);
    }

    .my-mfp-zoom-in.mfp-ready .zoom-anim-dialog {
        opacity: 1;

        -webkit-transform: scale(1);
        -moz-transform: scale(1);
        -ms-transform: scale(1);
        -o-transform: scale(1);
        transform: scale(1);
    }

    .my-mfp-zoom-in.mfp-removing .zoom-anim-dialog {
        -webkit-transform: scale(0.8);
        -moz-transform: scale(0.8);
        -ms-transform: scale(0.8);
        -o-transform: scale(0.8);
        transform: scale(0.8);

        opacity: 0;
    }

    .my-mfp-zoom-in.mfp-bg {
        opacity: 0.001;
        -webkit-transition: opacity 0.3s ease-out;
        -moz-transition: opacity 0.3s ease-out;
        -o-transition: opacity 0.3s ease-out;
        transition: opacity 0.3s ease-out;
    }

    .my-mfp-zoom-in.mfp-ready.mfp-bg {
        opacity: 0.8;
    }

    .my-mfp-zoom-in.mfp-removing.mfp-bg {
        opacity: 0;
    }

    .my-mfp-slide-bottom .zoom-anim-dialog {
        opacity: 0;
        -webkit-transition: all 0.2s ease-out;
        -moz-transition: all 0.2s ease-out;
        -o-transition: all 0.2s ease-out;
        transition: all 0.2s ease-out;

        -webkit-transform: translateY(-20px) perspective( 600px ) rotateX( 10deg );
        -moz-transform: translateY(-20px) perspective( 600px ) rotateX( 10deg );
        -ms-transform: translateY(-20px) perspective( 600px ) rotateX( 10deg );
        -o-transform: translateY(-20px) perspective( 600px ) rotateX( 10deg );
        transform: translateY(-20px) perspective( 600px ) rotateX( 10deg );

    }

    .my-mfp-slide-bottom.mfp-ready .zoom-anim-dialog {
        opacity: 1;
        -webkit-transform: translateY(0) perspective( 600px ) rotateX( 0 );
        -moz-transform: translateY(0) perspective( 600px ) rotateX( 0 );
        -ms-transform: translateY(0) perspective( 600px ) rotateX( 0 );
        -o-transform: translateY(0) perspective( 600px ) rotateX( 0 );
        transform: translateY(0) perspective( 600px ) rotateX( 0 );
    }

    .my-mfp-slide-bottom.mfp-removing .zoom-anim-dialog {
        opacity: 0;

        -webkit-transform: translateY(-10px) perspective( 600px ) rotateX( 10deg );
        -moz-transform: translateY(-10px) perspective( 600px ) rotateX( 10deg );
        -ms-transform: translateY(-10px) perspective( 600px ) rotateX( 10deg );
        -o-transform: translateY(-10px) perspective( 600px ) rotateX( 10deg );
        transform: translateY(-10px) perspective( 600px ) rotateX( 10deg );
    }

    .my-mfp-slide-bottom.mfp-bg {
        opacity: 0.01;

        -webkit-transition: opacity 0.3s ease-out;
        -moz-transition: opacity 0.3s ease-out;
        -o-transition: opacity 0.3s ease-out;
        transition: opacity 0.3s ease-out;
    }

    .my-mfp-slide-bottom.mfp-ready.mfp-bg {
        opacity: 0.8;
    }

    .my-mfp-slide-bottom.mfp-removing.mfp-bg {
        opacity: 0;
    }
</style>