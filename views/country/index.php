<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;

 ?>

 <h1>Countries</h1>
 <ul>

<?php foreach ($countries as $country): ?>
  <li>
      <h3><?= Html::encode("{$country->name}") ?> - <a href="index.php?r=country/view&code=<?= Html::encode($country->code) ?>"> <span class="glyphicon glyphicon-eye-open"></span></a></h3>
  </li>
<?php endforeach; ?>
 </ul>

 <?= LinkPager::widget(['pagination' => $pagination]) ?>
