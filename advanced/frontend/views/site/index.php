<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <br>

    <!-- <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div> -->

    <div class="body-content">

        <div class="row">
            
            <?php foreach ($model as $value):?>
                <div class="col-lg-4">
                <?= Html::img('/advanced/advanced/frontend/web/index.php?r=site/get-image&file_name='. $value->file_name, ['style'=>'width:200px;']) ?>    
                <h2><?= $value->title ?></h2>

                <p><?=$value->anounce ?></p>

                <p><a class="btn btn-default" href="http://localhost/advanced/advanced/frontend/web/index.php?r=post%2Fview&id=<?= $value->id?>">В статью &raquo;</a></p>
                
            </div>
            <?php endforeach ?>

            
            
            
        </div>

    </div>
</div>
