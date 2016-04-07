<?php

namespace app\modules\scratch\controllers;

use yii\web\Controller;

/**
 * Default controller for the `scratch` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->layout='scratch';
        return $this->render('index');
    }
}
