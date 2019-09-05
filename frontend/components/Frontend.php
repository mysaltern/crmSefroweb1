<?php

namespace frontend\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\db\Query;
use SoapClient;
use hoomanMirghasemi\jdf\Jdf;

//       Yii::$app->mycomponent->getStatus();
//       Yii::$app->mycomponent->last7Day();
class Frontend extends Component
{

    public function truncateStringWords($str, $maxlen): string
    {
        if (strlen($str) <= $maxlen)
            return $str;

        $newstr = substr($str, 0, $maxlen);
        if (substr($newstr, -1, 1) != ' ')
            $newstr = substr($newstr, 0, strrpos($newstr, " "));

        return $newstr;
    }

}

?>