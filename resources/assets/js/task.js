var TaskClass = function(options){

    var vars = {
        btnAddMore  : '#addTask',
        btnSubmit   : '#taskSubmit',
        btnRemove   : '#removeTask',
        btnEdit     : '#editTask'
    };

    var root = this;

    this.construct = function(options){
        $.extend(vars , options);
        $(document).delegate(vars.btnSubmit, "submit", submit);
        $(document).delegate(vars.btnAddMore, "click", add);
        $(document).delegate(vars.btnRemove, "click", remove);
        $(document).delegate(vars.btnEdit, "click", edit);

        [].forEach.call(document.getElementById('tasks').getElementsByClassName('task-items'), function (el){
            Sortable.create(el, {
                group: 'gtask',
                animation: 150,
                onAdd: addTaskFromAnotherState,
                onUpdate: movedTask
            });
        });
    };

    var add = function(event) {
        var element = event.target;
        var stateId=$(element).data('id');
        var url = $(element).data('url');

        $.ajax({
            data: {
                '_token': $('meta[name=csrf-token]').attr('content'),
                state_id:stateId,
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
                    $("ul[id=" + data.id + "] div").last().append(data.data);
                } else {
                    $("ul[id=" + data.id + "] div li[data-id=" + data.task_id + "]").replaceWith(data.data);
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

    var remove = function(event) {
        var element = event.target;
        var taskId=$(element).data('id');
        var url = $(element).data('url');



        $.ajax({
            data: {
                '_token': $('meta[name=csrf-token]').attr('content'),
                id:taskId,
            },
            method: "POST",
            url: url,
        })
        .done(function( data ) {
            if(data.success) {
                console.log($(element).parents('li'));
                $(element).parents('li').remove();
                $.featherlight(data.message);
            } else {
                $.featherlight(data.message);
            }
        }.bind(this));
    };

    var edit = function(event) {
        var element = event.target;
        var taskId=$(element).data('id');
        var url = $(element).data('url');

        $.ajax({
            data: {
                '_token': $('meta[name=csrf-token]').attr('content'),
                task_id:taskId,
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
    };

    var addTaskFromAnotherState = function(event){
        var element = event.target;
        console.log($(element));
    };


    var movedTask = function(event){
        var element = event.target;
        console.log($(element));
    };

    this.construct(options);
};

$( document ).ready(function() {
    var newTasksClass = new TaskClass({btnAddMore: '#addTask'});
});