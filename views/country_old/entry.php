<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<a href="index.php?r=country/index">Ritorna indietro</a>
<?php
//inizio form
$form = ActiveForm::begin();

//campi
//Scrive a video un campo input type text, associando al campo della form la proprietà nome
echo $form->field($model, 'code');

echo $form->field($model, 'name');

echo $form->field($model, 'population');
//pulsante submit

echo Html::submitButton('submit', ['class' => 'btn btn-primary']);

//fine form
ActiveForm::end();
?>
