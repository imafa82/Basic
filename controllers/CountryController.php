<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Country;
use app\models\CountryForm;

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

    //Prova

    public function actionProva(){
      echo "ciao mondo";
    }

    //Visualizzazione

    public function actionView($code){
      if(isset($code) && is_string($code)){
        $code = addslashes($code);
        $country = $this->findModel($code);
        //$country = Country::find()->where(['code' => $code])->one();


        return $this->render('view', [
              'country' => $country,
          ]);
      }else {
        return $this->redirect('index.php');
      }

    }

    // Delete

    public function actionDelete($code){
      if(isset($code)){
        $code = addslashes($code);
        $country = $this->findModel($code);;
        //$country = Country::find()->where(['code' => $code])->one();
        $country->delete();
        return $this->redirect('index.php?r=country/index');
      }else {
        return $this->redirect('index.php');
      }

    }


     public function actionForm($code = null)
    {
      //Istanzio un nuovo model un oggetto di classe EntryForm derivato da model
      //$model = new CountryForm();
      //$country = new Country;
      $model = new Country;
      // se i dati sono stati postati... fai qualcosa

        if($model->load(Yii::$app->request->post())
            // il metodo ci consente di validare tutti i dati presenti nella form ovvero Yii::$app->request->post()
            && $model->validate()
          ){
            if($code != null){
                $country = $this->findModel($code);
            }
            //in questa pagina ci sarà il risultato dell'elaborazione dei dati della form
            $country->code = $model->code;
            $country->name = $model->name;
            $country->population = $model->population;
            if($code != null){

                $country->update();

            }else{
                $country->save();
            }

            return $this->redirect('index.php?r=country/index');
            }

      //altrimenti carica la view della form
        else {
            if($code != null){
                $country = $this->findModel($code);
                $model->code = $country->code;
                $model->name = $country->name;
                $model->population = $country->population;
            }
          //In questa pagina ci sarà la form iniziale
          return $this->render('entry', ['model' => $model]);
        }
    }

    public function findModel($code){

       //$arrQuery = Country::find()->where(['code' => $code])->one();
       $arrQuery = Country::findOne($code);
       //print_r($arrQuery);die();
       return $arrQuery;


     }

}


 ?>
