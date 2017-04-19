<?php
use yii\helpers\Html;
?>
<style>
    .marginButton{
      margin: 20px 5px;
    }
    h3{
      float:left;
    }
</style>
<a href="index.php?r=country/index">Ritorna indietro</a>
<div class="panel panel-default">
  <div class="panel-body">
    <h3><?= $country->name ?></h3>
    <?= Html::a('Update', ['country/form', 'code' => $country->code],
    ['class' => 'btn btn-primary pull-right marginButton']) ?>

    <?= Html::a('Delete', ['country/delete', 'code' => $country->code], [
               'class' => 'btn btn-danger pull-right marginButton',
               'data' => [
                   'confirm' => 'Sei sicuro di voler cancellare il dato?',
                   'method' => 'post',
               ],
           ]) ?>

  </div>
</div>
<div class="row">
  <section class="col-md-6">
        <p class="text-muted">Codice = <?= $country->code ?></p>
  </section>
  <section class="col-md-6">
        <p>Popolazione = <?= $country->population ?></p>
  </section>

</div>
