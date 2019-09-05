<?php


use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;


/* @var $this yii\web\View */
/* @var $searchModel app\models\SleOrderDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sle Order Details';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<div class="sle-order-detail-index ">


    <div id="ajaxCrudDatatable">

        <h2 class="">

            <?php

            $id = $_GET['id'];

            ?>

        </h2>
        <?=

        GridView::widget([
            'id' => 'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax' => true,
            'columns' => require(__DIR__ . '/_columns.php'),
            'toolbar' => [
                    ['content' =>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['role' => 'modal-remote', 'title' => 'Create new Sle Order Details', 'class' => 'btn btn-default']) .
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''], ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => 'Reset Grid']) .
                    Html::a('<i class="glyphicon glyphicon-ok">انتخاب مرکز</i>', ["./center?id=$id"], ['data-pjax' => 1, 'value' => $id, 'class' => 'btn btn-default', 'title' => ' ']) .
                    '{toggleData}' .
                    '{export}'
                ],
            ],
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'panel' => [
                'type' => 'primary',
                'heading' => '<i class="glyphicon glyphicon-list"></i> Sle Order Details listing',
                'before' => '',
                'after' => BulkButtonWidget::widget([
                    'buttons' => Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp;حذف تمام موارد', ["bulk-delete"], [
                        "class" => "btn btn-danger btn-xs",
                        'role' => 'modal-remote-bulk',
                        'data-confirm' => false, 'data-method' => false, // for overide yii data api
                        'data-request-method' => 'post',
                        'data-confirm-title' => 'آیا مطمئن هستید ؟',
                        'data-confirm-message' => 'آیا از حذف این مورد مطمئن هستید ؟'
                    ]),
                ]) .
                '<div class="clearfix"></div>',
            ]
        ])

        ?>
    </div>
</div>
<?php

Modal::begin([
    "id" => "ajaxCrudModal",
    "footer" => "", // always need it for jquery plugin
])

?>
<?php Modal::end(); ?>
