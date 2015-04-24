<?php
require(__DIR__ . '/BaseYii.php');

/**
 * YII 继承 baseYii
 */
class Yii extends \yii\BaseYii
{
}

Yii::$classMap = require(__DIR__ . '/classes.php');

var_dump(Yii::getVersion());