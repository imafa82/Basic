<?php
use yii\helpers\Html;
?>
<a href="index.php?r=country/index">Ritorna indietro</a>
<h1><?= $country->name ?></h1>
<div class="row">
  <section class="col-md-6">
        <p class="text-muted">Codice = <?= $country->code ?></p>
  </section>
  <section class="col-md-6">
        <p>Popolazione = <?= $country->population ?></p>
  </section>

</div>
