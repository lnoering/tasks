//TODO - implementar addicionar/update/delete task

var TaskClass = function(options){

    var vars = {
        btnAddMore  : '#addTask'
    };

    var root = this;

    this.construct = function(options){
        alert(options.btnAddMore);
        $.extend(vars , options);
        $('body').delegate(vars.btnAddMore, "click", addTask);
    };

    var addTask = function(event){
        var element = event.target;
        var id=$(element).attr('id');
        alert("ID:"+id);
    }

    this.construct(options);
};

$( document ).ready(function() {
    var newTasksClass = new TaskClass({btnAddMore: '#addTask'});
});