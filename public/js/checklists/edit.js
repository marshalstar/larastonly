$(function() {

    $(document).on('click', '.btn-new-title', newTitle);
    $(document).on('click', '.btn-new-question', newQuestion);
    $(document).on('click', '.btn-new-alternative', newAlternative);

    $(document).on('click', '.btn-del-title', delTitle);
    $(document).on('click', '.btn-del-question', delQuestion);
    $(document).on('click', '.btn-del-alternative', delAlternative);

    $(document).on('change', '.input-checklist', inputChecklist);
    $(document).on('change', '.input-title', inputTitle);
    $(document).on('change', '.input-question', inputQuestion);
    $(document).on('change', '.input-alternative', inputAlternative);
    $(document).on('change', '.input-weight', inputWeight);
    $(document).on('change', '.input-type-question', inputTypeQuestion);

    function newTitle() {
        var data = {
            name: titleNameDefault,
            checklist_id: checklistId
        };
        var titleOrChecklist = $(this).closest('div.title');
        if (titleOrChecklist.length == 0) {
            titleOrChecklist = $('div.checklist');
        } else {
            data['title_id'] = titleOrChecklist.attr('data-id');
        }
        $.ajax({
            url: titleUrlStoreAjax,
            method: "POST",
            data: data,
            success: function(e) {
                appendTitle(titleOrChecklist.children().find('.titles').first(), e);
            },
            error: function(e) {
                console.error(e);
            }
        });
    }

    function appendTitle(container, e) {

        var layer = container.parents('.title').length + 3;
        container.append('<div class="panel panel-default title" data-id="'+ e.id +'" data-layer="'+ layer +'" style="border: 10px solid #ddd;">\
                        \
                        <div class="panel-heading clearfix" style="background-color: #DDD;" >\
                            <div class="form-group">\
                                <label for="title" class="col-lg-1 col-md-1 col-sm-2 col-xs-12">\
                                    <h'+layer+'>'+ titleNameDefault +'</h'+layer+'>\
                                </label>\
                                <div class="col-lg-10 col-md-10 col-sm-9 col-xs-10">\
                                    <textarea class="input-title form-control" rows="2" value="'+ e.name +'" placeholder="'+ titleNameDefault +'"></textarea>\
                                </div>\
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">\
                                    <a href="javascript:void(0)" class="btn-del-title btn"><span class="glyphicon glyphicon-remove"></span></a>\
                                </div>\
                            </div>\
                            </div>\
                        \
                            <div class="list-group">\
                                <div class="questions"></div>\
                                <a href="javascript:void(0)" class="btn-new-question list-group-item"><span class="glyphicon glyphicon-plus"></span> question</a>\
                            </div>\
                                    \
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">\
                                <div class="row titles"></div>\
                            </div>\
                        \
                            <div class="panel-footer">\
                                <a href="javascript:void(0)" class="btn-new-title"><span class="glyphicon glyphicon-plus"></span> title</a>\
                            </div>\
                        </div>');
    }

    function newQuestion() {
        var title = $(this).closest('div.title');
        $.ajax({
            url: questionUrlStoreAjax,
            method: "POST",
            data: {
                statement: questionStatementDefault,
                title_id: title.attr('data-id')
            },
            success: function(e) {
                appendQuestion(title.children().find('.questions').first(), e);

                for(var i = 0; i < e.alternatives.length; ++i) {
                    var alternative = e.alternatives[i];
                    appendAlternative($('[data-id="'+e.id+'"]').children().find(".alternatives").first(), alternative);
                }
            },
            error: function(e) {
                console.error(e);
            }
        });
    }

    function appendQuestion(container, e) {

        container.append('<div class="list-group-item question" data-id="'+ e.id +'">\
                        \
                            <div class="row form-group">\
                                <label for="title" class="col-lg-1 col-md-1 col-sm-2 col-xs-12">'+ questionStatementDefault +'</label>\
                                <div class="col-lg-10 col-md-10 col-sm-9 col-xs-10">\
                                    <textarea class="input-question form-control" rows="2" value="'+ e.statement +'" placeholder="'+ questionStatementDefault +'"></textarea>\
                                </div>\
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">\
                                    <a href="javascript:void(0)" class="btn-del-question btn"><span class="glyphicon glyphicon-remove"></span></a>\
                                </div>\
                            </div>\
                        \
                            <div class="row form-group">\
                                <label for="title" class="col-lg-1 col-md-1 col-sm-2 col-xs-12">'+ typeQuestionNameDefault +'</label>\
                                <div class="col-lg-10 col-md-10 col-sm-9 col-xs-10">'+ htmlSelect +'</div>\
                            </div>\
                        \
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">\
                                <div class="row alternatives"></div>\
                            </div>\
                        \
                            <div class="row">\
                                <a href="javascript:void(0)" class="btn-new-alternative col-lg-12 col-md-12 col-sm-12 col-xs-12">\
                                    <span class="glyphicon glyphicon-plus"></span> Adicionar alternativa\
                                </a>\
                            </div>\
                        </div>');
        $("[data-id='"+ e.id+"'] select").val(e.typeQuestion_id);
    }

    function newAlternative() {
        var question = $(this).closest('div.question');
        $.ajax({
            url: alternativeUrlStoreAjax,
            method: "POST",
            data: {
                name: alternativeNameDefault,
                question_id: question.attr('data-id')
            },
            success: function(e) {
                appendAlternative(question.children().find('.alternatives').first(), e);
            },
            error: function(e) {
                console.error(e);
            }
        });
    }

    function appendAlternative(container, e) {

        container.append('<div class="alternative" data-id="'+ e.id +'">\
            <ul class="nav nav-pills">\
                <li><input class="input-alternative form-control" type="text" value="'+ e.name +'" placeholder="Alternativa"/></li>\
                <li>\
                    <div class="form-group form-group-sm">\
                        <h8>\
                            <a href="javascript:void(0)" class="control-label btn-del-alternative"><span class="glyphicon glyphicon-remove"></span></a>\
                        </h8>\
                    </div>\
                </li>\
            </ul>\
        </div>');
    }

    function delTitle() {
        var title = $(this).closest('div.title');
        $(this).addClass('disabled');
        $.ajax({
            url: titleUrlDestroyAjax.replace('key', title.attr("data-id")),
            method: "DELETE",
            success: function(e) {
                title.remove();
            },
            error: function(e) {
                console.error(e);
            }
        });
    }

    function delQuestion() {
        var question = $(this).closest('div.question');
        $(this).addClass('disabled');
        $.ajax({
            url: questionUrlDestroyAjax.replace('key', question.attr("data-id")),
            method: "DELETE",
            success: function(e) {
                question.remove();
            },
            error: function(e) {
                console.error(e);
            }
        });
    }

    function delAlternative() {
        var alternative = $(this).closest('div.alternative');
        var question = $(this).closest('div.question');
        $(this).addClass('disabled');
        $.ajax({
            url: alternativeUrlDestroyAjax.replace('key', alternative.attr("data-id")),
            method: "DELETE",
            data: {
                question_id: question.attr('data-id')
            },
            success: function(e) {
                alternative.remove();
            },
            error: function(e) {
                console.error(e);
            }
        });
    }

    function inputChecklist() {
        var checklist = $(this).closest('div.checklist');
        var input = $(this);
        $.ajax({
            url: checklistUrlUpdateAjax.replace('key', checklist.attr('data-id')),
            method: 'POST',
            data: {name: input.val()},
            success: function(e) {
                if (e.id !== undefined) {
                    checklist.attr('data-id', e.id);
                }
            },
            error: function(e) {
                console.error(e);
            }
        });
    }

    function inputTitle() {
        var title = $(this).closest('div.title');
        var input = $(this);
        console.log('sim');
        $.ajax({
            url: titleUrlUpdateAjax.replace('key', title.attr('data-id')),
            method: 'POST',
            data: {name: input.val()},
            success: function(e) {
                if (e.id !== undefined) {
                    title.attr('data-id', e.id);
                }
            },
            error: function(e) {
                console.error(e);
            }
        });
    }

    function inputQuestion() {
        var question = $(this).closest('div.question');
        var input = $(this);
        $.ajax({
            url: questionUrlUpdateAjax.replace('key', question.attr('data-id')),
            method: 'POST',
            data: {statement: input.val()},
            success: function(e) {
                if (e.id !== undefined) {
                    question.attr('data-id', e.id);
                }
            },
            error: function(e) {
                console.error(e);
            }
        });
    }

    function inputAlternative() {
        var alternative = $(this).closest('div.alternative');
        var input = $(this);
        $.ajax({
            url: alternativeUrlUpdateAjax.replace('key', alternative.attr('data-id')),
            method: 'POST',
            data: {name: input.val()},
            success: function(e) {
                if (e.id !== undefined) {
                    alternative.attr('data-id', e.id);
                }
            },
            error: function(e) {
                console.error(e);
            }
        });
    }

    function inputWeight() {
        var question = $(this).closest('div.question');
        var input = $(this);
        $.ajax({
            url: questionUrlUpdateAjax.replace('key', question.attr('data-id')),
            method: 'POST',
            data: {weight: input.val()},
            success: function(e) {},
            error: function(e) {
                console.error(e);
            }
        });
    }

    function inputTypeQuestion() {
        var alternative = $(this);
        var typeQuestionId = $(this).val();
        var question = $(this).closest('div.question');
        question.children().find('.alternative').each(function() {
            $.ajax({
                url: alternativeUrlUpdateAjax.replace('key', $(this).attr('data-id')),
                method: 'POST',
                data: {typeQuestion_id: typeQuestionId},
                success: function(e) {
                    if (e.id !== undefined) {
                        alternative.attr('data-id', e.id);
                    }
                },
                error: function(e) {
                    console.error(e);
                }
            });
        });
    }

});

/*
 var titleNameDefault = [...];
 var titleUrlStoreAjax = [...];
 var titleUrlDestroyAjax = [...];
 var titleUrlUpdateAjax = [...];

 var questionStatementDefault = [...];
 var questionUrlStoreAjax = [...];
 var questionUrlDestroyAjax = [...];
 var questionUrlUpdateAjax = [...];

 var alternativeNameDefault = [...];
 var alternativeUrlStoreAjax = [...];
 var alternativeUrlDestroyAjax = [...];
 var alternativeUrlUpdateAjax = [...];

 var typeQuestionNameDefault = [...];
 var typeQuestionIdDefault = [...];

 var checklistId = [...];
 var checklistUrlUpdateAjax = [...];

 var htmlSelect = [...];
 */