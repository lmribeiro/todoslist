<li id="taks-<?= $task->id ?>" style="list-style: none; margin-left: -38px;">
    <input type="checkbox" id="task-<?= $task->id ?>-check" onchange="javascript:app.taskUpdate(<?= $task->project_id ?>,<?= $task->id ?>)" data-toggle="tooltip" data-placement="top" title="Done">
    <?= $task->description ?>
    <a class="pull-right text-danger" href="#" onclick="javascript:app.taskDelete(<?= $task->id ?>)" data-toggle="tooltip" data-placement="top" title="Delete">
        <i class="glyphicon glyphicon-trash"></i>
    </a>
</li>