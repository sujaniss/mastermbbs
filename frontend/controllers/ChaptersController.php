<?php

namespace frontend\controllers;

use backend\models\Chapters;

class ChaptersController extends \yii\web\Controller {

        public function actionIndex() {
                return $this->render('index');
        }

}
