<div class="col-sm-6" id="project-<?= $model->id ?>">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="btn-group pull-right" style="margin-top: -6px; margin-right: -4px;">
                <button type="button" class="btn btn-sm btn-primary" onclick="javascript:app.projectUpdate(<?= $model->id ?>)" data-toggle="tooltip" data-placement="top" title="Rename">
                    <i class="glyphicon glyphicon-pencil"></i>
                </button>
                <button type="button" class="btn btn-sm btn-danger" onclick="javascript:app.projectDelete(<?= $model->id ?>)" data-toggle="tooltip" data-placement="top" title="Delete">
                    <i class="glyphicon glyphicon-trash"></i>
                </button>
            </div>
            <h3 class="panel-title" id="project-<?= $model->id ?>-name">Project <?= $model->name ?></h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <legend>To Do</legend>
                    <ul id="project-<?= $model->id ?>-todo">
                        <?php
                        foreach ($model->tasks as $task) {
                            if (!$task->finished) {
                                require(__DIR__.'/../task/todo.php');
                            }
                        }

                        ?>
                    </ul>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-12">
                    <legend>Done</legend>
                    <ul id="project-<?= $model->id ?>-done">
                    <?php
                        foreach ($model->tasks as $task) {
                            if ($task->finished) {
                                require(__DIR__.'/../task/done.php');
                            }
                        }

                        ?></ul>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="form-inline text-right" style="margin-right: -4px;">
                <div class="form-group">
                    <input type="text" class="form-control " style="height: 36px;" id="project-<?= $model->id ?>-task-description" placeholder="Task" autocomplete="off">
                </div>
                <button onclick="javascript:app.taskCreate(<?= $model->id ?>)" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>