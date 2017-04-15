<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;

 ?>

<h1>Countries <a href="index.php?r=country/form"><span class="glyphicon glyphicon-plus"></span></a> </h1>
 <ul>

<?php foreach ($countries as $country): ?>
  <li>
      <h3><?= Html::encode("{$country->name}") ?> - <a href="index.php?r=country/view&code=<?= Html::encode($country->code) ?>"> <span class="glyphicon glyphicon-eye-open"></span> Dettaglio</a> - <a href="index.php?r=country/form&code=<?= Html::encode($country->code) ?>"><span class="glyphicon glyphicon-pencil"></span> Modifica</a> - <a href="index.php?r=country/delete&code=<?= Html::encode($country->code) ?>"><span class="glyphicon glyphicon-remove"></span> Elimina</a>  </h3>
  </li>
<?php endforeach; ?>
 </ul>

 <?= LinkPager::widget(['pagination' => $pagination]) ?>
