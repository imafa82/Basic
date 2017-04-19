<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;

 ?>
<style>
h3 a{
  padding: 0 15px;
  margin-top: -7px;
  cursor: pointer;
  color:white;
  text-shadow: 1px 1px 1px black, -1px -1px 1px gray;
}
h3 a:hover{
  color:black;
  text-shadow: 1px 1px 1px gray, -1px -1px 1px white;
  text-decoration: none;
}
h3 span:nth-child(1){
  display: block;
  text-align: center;
}
h3 span:nth-child(2){
  font-size: 0.50em;
}
</style>

<h1>Countries <a href="index.php?r=country/form"><span class="glyphicon glyphicon-plus"></span></a> </h1>
 <ul class="list-group">

<?php foreach ($countries as $country): ?>
  <li class="list-group-item list-group-item-success">
      <h3><?= Html::encode("{$country->name}") ?>  <a class="pull-right" href="index.php?r=country/view&code=<?= Html::encode($country->code) ?>"> <span class="glyphicon glyphicon-eye-open"></span> <span>Dettaglio</span></a>  <a class="pull-right" href="index.php?r=country/form&code=<?= Html::encode($country->code) ?>"><span class="glyphicon glyphicon-pencil"></span> <span>Modifica</span></a> <a class="pull-right" href="index.php?r=country/delete&code=<?= Html::encode($country->code) ?>"><span class="glyphicon glyphicon-remove"></span> <span>Elimina</span></a>  </h3>
  </li>
<?php endforeach; ?>
 </ul>

 <?= LinkPager::widget(['pagination' => $pagination]) ?>
