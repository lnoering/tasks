//TODO - implementar addicionar/update/delete state

var StateClass = function(options){

    var vars = {
        btnAddMore  : '#addState'
    };

    var root = this;

    this.construct = function(options){
        $.extend(vars , options);
        $('body').delegate(vars.btnAddMore, "click", addState);

        Sortable.create(document.getElementById('tasks'), {
            animation: 150,
            draggable: '.task-group',
            handle: '.task-group-name',
            onUpdate: movedState
        });
    };

    var addState = function(event){
        var element = event.target;
        var id=$(element).attr('id');
    }

    var movedState = function(event){
        var element = event.target;
        console.log($(element));
    }

    this.construct(options);
};

$( document ).ready(function() {
    var newTasksClass = new StateClass({btnAddMore: '#addState'});
});