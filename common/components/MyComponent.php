<?php

namespace common\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\db\Query;
use SoapClient;
use hoomanMirghasemi\jdf\Jdf;

//       Yii::$app->mycomponent->getStatus();
//       Yii::$app->mycomponent->last7Day();
class MyComponent extends Component
{

    public function welcome()
    {
        echo "Hello..Welcome to MyComponent";
    }

    public static function gregorian_to_jalali_date($dateTime)
    {
        $time = explode(' ', $dateTime);
        $date = explode('-', $time[0]);
        $g_y = $date[0];
        $g_m = $date[1];
        $g_d = $date[2];
        $mod = '/';
        $d_4 = $g_y % 4;
        $g_a = array(0, 0, 31, 59, 90, 120, 151, 181, 212, 243, 273, 304, 334);
        $doy_g = $g_a[(int) $g_m] + $g_d;
        if ($d_4 == 0 and $g_m > 2)
            $doy_g++;
        $d_33 = (int) ((($g_y - 16) % 132) * .0305);
        $a = ($d_33 == 3 or $d_33 < ($d_4 - 1) or $d_4 == 0) ? 286 : 287;
        $b = (($d_33 == 1 or $d_33 == 2) and ( $d_33 == $d_4 or $d_4 == 1)) ? 78 : (($d_33 == 3 and $d_4 == 0) ? 80 : 79);
        if ((int) (($g_y - 10) / 63) == 30)
        {
            $a--;
            $b++;
        }
        if ($doy_g > $b)
        {
            $jy = $g_y - 621;
            $doy_j = $doy_g - $b;
        }
        else
        {
            $jy = $g_y - 622;
            $doy_j = $doy_g + $a;
        }
        if ($doy_j < 187)
        {
            $jm = (int) (($doy_j - 1) / 31);
            $jd = $doy_j - (31 * $jm++);
        }
        else
        {
            $jm = (int) (($doy_j - 187) / 30);
            $jd = $doy_j - 186 - ($jm * 30);
            $jm += 7;
        }
        return($mod == '') ? array($jy, $jm, $jd) : $jy . $mod . $jm . $mod . $jd . ' ' . $time[1];
    }

    public function getImageSize($path, $size)
    {


        return str_replace('large', $size, $path);
    }

    public function menuORG()
    {
        $rows = (new \yii\db\Query())
                ->select(['*'])
                ->from('navigation')
//                ->where(['last_name' => 'Smith'])
//                ->limit(10)
                ->all();
        return $rows;
    }

    public function menu_product()
    {

        $rows = (new \yii\db\Query())
                ->select(['*'])
                ->from('inv_ProductCategories')
//                ->where(['last_name' => 'Smith'])
//                ->limit(10)
                ->all();
        return $rows;
    }

    public function imgURL()
    {


        $database = (new \yii\db\Query())
                ->select(['*'])
                ->from('config')
                ->all();

        return($database[0]['images']);
    }

    public function getContactID($userID)
    {

        $rows = (new \yii\db\Query())
                ->select(['id'])
                ->from('crm_Contacts')
                ->where(['userID' => "$userID"])
//                ->limit(10)
                ->one();
        if (isset($rows['id']))
        {
            return $rows['id'];
        }
        else
        {
            return false;
        }
    }

    public function getStatus($id)
    {

        if ($id == 1)
        {
            return 'در حال بررسی';
        }
        elseif ($id == 0)
        {
            return 'تایید شده';
        }
        elseif ($id == 2)
        {
            return 'رد شده';
        }
        elseif ($id == 3)
        {
            return '';
        }
        elseif ($id == 4)
        {
            return 'تایید شده';
        }
        elseif ($id == 5)
        {
            return 'تایید شده';
        }
        else
        {
            return 'نا مشخص';
        }
    }

    public function last7Day($name = false)
    {

        $d = Jdf::jgetdate(-1);
        $name = [];
        for ($i = 6; $i >= 0; $i--)
        {

            $timeG = mktime(0, 0, 0, date("m"), date("d") - $i, date("Y"));
            $time[$i]['time'] = $timeG;
            $time[$i]['day'] = Jdf::jgetdate($timeG);

            $name[] = $time[$i]['day']['weekday'];
        }


        if ($name != true)
        {
            return $time;
        }
        else
        {
            return $name;
        }
    }

    public function _custom_check_national_code($code)
    {
        if (!preg_match('/^[0-9]{10}$/', $code))
            return false;
        for ($i = 0; $i < 10; $i++)
            if (preg_match('/^' . $i . '{10}$/', $code))
                return false;
        for ($i = 0, $sum = 0; $i < 9; $i++)
            $sum += ((10 - $i) * intval(substr($code, $i, 1)));
        $ret = $sum % 11;
        $parity = intval(substr($code, 9, 1));
        if (($ret < 2 && $ret == $parity) || ($ret >= 2 && $ret == 11 - $parity))
            return true;
        return false;
    }

}

?>