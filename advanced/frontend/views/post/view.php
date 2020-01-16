<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


\yii\web\YiiAsset::register($this);
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?php if ($model->file_name) : ?>
        <img src="<?= \yii\helpers\Url::to(['post/get-image', 'file_name' => $model->file_name]) ?>" alt="" style="height: 200px; width: 300px">    
    <?php endif; ?>


    <h4>
        <?php echo 'Автор: '.$model->author ?>
    </h4>

    <h4>
        <?php echo 'Дата: '.$model->created_at ?>
    </h4>

    <div>
        <?php echo $model->content?>
    </div>   


 
    


</div>
