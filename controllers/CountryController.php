<?php
namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Country;


//IL controller utilizza il model e si chiama Country.php

class CountryController extends Controller {
    public function actionIndex(){
      $query = Country::find(); // select
      //$query è un recorset, restituisce un oggetto di PDOStatement
      $pagination = new Pagination([
        'defaultPageSize' => 5, //record per pagina
        'totalCount' => $query->count(), //conteggio record
      ]);
      // Ordinamento e Limit
      $countries = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            //offset e Limit sono equivalenti all'istruzione SQL offset è il primo, limit il secondo parametro select * from country limit(11,20)
            ->all();
            // da il fetch dei dati fetchAll(PDO::FETCH_BOTH) traduce quindi una matrice di array associativi


      return $this->render('index', [
            'countries' => $countries,
            'pagination' => $pagination,
        ]);
    }

    public function actionProva(){
      echo "ciao mondo";
    }
    public function actionView($code){
      if(isset($code) && is_string($code)){
        $code = addslashes($code);
        $country = Country::findOne($code);
        //$country = Country::find()->where(['code' => $code])->one();


        return $this->render('view', [
              'country' => $country,
          ]);
      }else {
        return $this->redirect('index.php');
      }

    }


}


 ?>
