//TODO - implementar addicionar/update/delete task

var TaskClass = function(options){

    var vars = {
        btnAddMore  : '#addTask'
    };

    var root = this;

    this.construct = function(options){
        $.extend(vars , options);
        $(document).delegate(vars.btnAddMore, "click", addTask);
        $(document).delegate('#taskSubmit', "submit", taskSubmit);

        [].forEach.call(document.getElementById('tasks').getElementsByClassName('task-items'), function (el){
            Sortable.create(el, {
                group: 'gtask',
                animation: 150,
                onAdd: addTaskFromAnotherState,
                onUpdate: movedTask
            });
        });
    };

    var taskSubmit = function(event) {
        event.preventDefault();
        console.log('aaaa');
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
                $( "ul[id="+data.id+"] div li" ).last().append( data.data );
            } else {
                $.featherlight(data.message);
            }
        });
    }

    var addTask = function(event) {
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

    var addTaskFromAnotherState = function(event){
        var element = event.target;
        console.log($(element));
    }


    var movedTask = function(event){
        var element = event.target;
        console.log($(element));
    }

    this.construct(options);
};

$( document ).ready(function() {
    var newTasksClass = new TaskClass({btnAddMore: '#addTask'});
});