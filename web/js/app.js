var app = (function () {

    // Initialize the application
    var init = function () {
        $('[data-toggle="tooltip"]').tooltip();
    };

    // Project Actions
    var projectCreate = function () {
        var name = $('#project-name').val();
        if (name !== "") {
            $.ajax({
                type: "POST",
                method: "POST",
                url: window.location.pathname + "/project/create",
                async: true,
                data: {name: name},
                success: function (data) {
                    $('#projects').append(data);
                    app.notify("Project created with success", "success");
                },
                error: function (data) {
                    app.notify("Fail to create Project", "danger");
                    console.log(data);
                }
            });
            $("#project-name").val('');
        }
    };
    var projectUpdate = function (update) {
        var name;
        $('#edit_modal').modal('show');
        $('#edit_id').unbind('click');
        $('#edit_id').click(function () {
            name = $('#new-name').val();
            $.ajax({
                type: "POST",
                method: "POST",
                url: window.location.pathname + "/project/update",
                async: true,
                data: {id: update, name: name},
                success: function (data) {
                    if (data === "ok") {
                        $('#project-' + update + '-name').html("Project " + name);
                        $('#new-name').val("");
                        app.notify("Project renamed with success", "success");
                    } else {
                        app.notify("Fail to rename Project", "danger");
                    }

                },
                error: function (data) {
                    console.log(data);
                }
            });
        });
    };
    var projectDelete = function (id) {
        $('#delete_modal').modal('show');
        $('#delete_id').unbind('click');
        $('#delete_id').click(function () {
            $.ajax({
                type: "POST",
                method: "POST",
                url: window.location.pathname + "/project/delete",
                async: true,
                data: {id: id},
                success: function (data) {
                    if (data === "ok") {
                        $('#project-' + id).remove();
                        app.notify("Project deleted with success", "success");
                    } else {
                        app.notify("Fail to delete Project", "danger");
                    }

                },
                error: function (data) {
                    console.log(data);
                }
            });
        });
    };

    // Task Actions
    var taskCreate = function (id) {
        var description = $('#project-' + id + '-task-description').val();
        if (description !== "") {
            $.ajax({
                type: "POST",
                method: "POST",
                url: window.location.pathname + "/task/create",
                async: true,
                data: {id: id, description: description},
                success: function (data) {
                    $('#project-' + id + '-todo').append(data);
                    app.notify("Task created with success", "success");
                },
                error: function (data) {
                    app.notify("Fail to create Task", "danger");
                    console.log(data);
                }
            });
            $('#project-' + id + '-task-description').val('');
        }
    };
    var taskUpdate = function (project, id) {
        $.ajax({
            type: "POST",
            method: "POST",
            url: window.location.pathname + "/task/update",
            async: true,
            data: {id: id},
            success: function (data) {
                $('#taks-' + id).remove();
                $('#project-' + project + '-done').append(data);
                app.notify("Task done with success", "success");

            },
            error: function (data) {
                app.notify("Fail to do Task", "danger");
                console.log(data);
            }
        });
    };
    var taskDelete = function (id) {
        $.ajax({
            type: "POST",
            method: "POST",
            url: window.location.pathname + "/task/delete",
            async: true,
            data: {id: id},
            success: function (data) {
                if (data === "ok") {
                    $('#taks-' + id).remove();
                    app.notify("Task deleted with success", "success");
                }
            },
            error: function (data) {
                app.notify("Fail to delete Task", "danger");
                console.log(data);
            }
        });
    };

    // Notify Actions
    var notify = function (message, type) {
        $.notify({
            icon: 'fa fa-bell',
            message: message

        }, {
            type: type,
            timer: 3000
        });
    };

    // Return the public facing methods for the App
    return {
        init: init,
        projectCreate: projectCreate,
        projectUpdate: projectUpdate,
        projectDelete: projectDelete,
        taskCreate: taskCreate,
        taskUpdate: taskUpdate,
        taskDelete: taskDelete,
        notify: notify
    };

}());
$(function () {
    app.init();
});
