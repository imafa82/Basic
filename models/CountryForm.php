<?php

namespace app\models;

use Yii;
use yii\base\Model;

class CountryForm extends Model {
  //proprietà
  public $code;
  public $name;
  public $population;


  //metodi -- trattandosi di una form devo utilizzare le rules

    public function rules(){
      return [
        [['code', 'name', 'population'], 'required'],
       
      ];
    }

}
