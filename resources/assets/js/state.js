//TODO - implementar addicionar/update/delete state

var StateClass = function(options){

    var vars = {
        btnAddMore  : '#addState',
        btnSubmit   : '#stateSubmit',
    };

    var root = this;

    this.construct = function(options){
        $.extend(vars , options);

        $(document).delegate(vars.btnAddMore, "click", add);
        $(document).delegate(vars.btnSubmit, "submit", submit);

        Sortable.create(document.getElementById('tasks'), {
            animation: 150,
            draggable: '.task-group',
            handle: '.task-group-name',
            onUpdate: movedState
        });
    };

    var add = function(event) {
        var element = event.target;
        var stateId=$(element).data('id');
        var url = $(element).data('url');

        $.ajax({
            data: {
                '_token': $('meta[name=csrf-token]').attr('content')
            },
            method: "POST",
            url: url,
        })
        .done(function( data ) {
            if(data.success) {
                $.featherlight(data.message);
            } else {
                $.featherlight(data.message);
            }
        });
    }

    var submit = function(event) {
        event.preventDefault();
        var element = event.target;
        var url = $(element).attr('action');
        var data = $(element).serialize();

        $.ajax({
            data: data,
            method: "POST",
            url: url,
        })
        .done(function( data ) {
            $.featherlight.close();
            if(data.success) {
                if(url.indexOf("insert") > -1) {
                    $("div[id=tasks] ul").last().before(data.data);
                } else {
                    //TODO - fazer o replace do texto apenas.
                    // $("ul[id=" + data.id + "] div li[data-id=" + data.task_id + "]").replaceWith(data.data);
                }
            } else {
                var msg = data.message;
                if(data.exception) {
                    msg += "</br>"+data.exception;
                }
                $.featherlight(msg);
            }
        }.bind(this));
    };

    var movedState = function(event){
        var element = event.target;
        console.log($(element));
    }

    this.construct(options);
};

$( document ).ready(function() {
    var newTasksClass = new StateClass({btnAddMore: '#addState'});
});