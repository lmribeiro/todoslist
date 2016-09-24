<style>
    .tooltip {
        width: 79px;
    }
</style>
<li id="taks-<?= $task->id ?>" style="list-style: none; margin-left: -38px;">
    <input type="checkbox" checked="" disabled="">
    <?= $task->description ?>
    <span class="pull-right" data-toggle="tooltip" data-placement="top" title="<?= date('Y-m-d H:i', strtotime($task->finished_at)) ?>"><i class="glyphicon glyphicon-time"></i></span>
</li>