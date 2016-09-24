<?php
/* @var $this yii\web\View */

$this->title = Yii::$app->name.' | Projects';

?>
<div class="site-index">

    <h1 class="text-center">Projects</h1>
    <hr/>

    <div class="container">
        <div class="row">
            <div id="projects">
                <?php if ($projects) { ?>
                    <?php foreach ($projects as $model) { ?>
                        <?php require(__DIR__.'/../project/create.php'); ?>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="delete_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Delete Project</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this project?</p>  
                <p></p>                
            </div>
            <div class="modal-footer">
                <a id="delete_id" href="#" data-dismiss="modal" class="btn btn-danger">Delete</a>  
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="edit_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Rename Project</h4>
            </div>
            <div class="modal-body">
                <input id="new-name" type="text" class="form-control" placeholder="Insert project's new name">
                <p></p>                
            </div>
            <div class="modal-footer">
                <a id="edit_id" href="#" data-dismiss="modal" class="btn btn-primary">Rename</a>  
            </div>
        </div>
    </div>
</div>