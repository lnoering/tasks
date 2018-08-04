//TODO - implementar addicionar/update/delete state

var StateClass = function(options){

    var vars = {
        btnAddMore  : '#addState'
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
    var newTasksClass = new StateClass({btnAddMore: '#addState'});
});