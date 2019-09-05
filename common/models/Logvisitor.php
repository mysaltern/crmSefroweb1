<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "logvisitor".
 *
 * @property string $id
 * @property string $ip
 * @property string $time
 * @property string $rfc822
 * @property string $uri
 * @property string $get
 * @property string $post
 * @property string $cookies
 * @property string $session
 * @property string $method
 * @property string $scheme
 * @property string $protocol
 * @property string $port
 * @property string $browser
 * @property string $language
 */
class Logvisitor extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'logvisitor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['time'], 'integer'],
            [['get', 'post', 'cookies', 'session', 'browser', 'language'], 'string'],
            [['ip'], 'string', 'max' => 20],
            [['rfc822'], 'string', 'max' => 50],
            [['uri'], 'string', 'max' => 255],
            [['method', 'scheme', 'protocol', 'port'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ip' => 'Ip',
            'time' => 'Time',
            'rfc822' => 'Rfc822',
            'uri' => 'Uri',
            'get' => 'Get',
            'post' => 'Post',
            'cookies' => 'Cookies',
            'session' => 'Session',
            'method' => 'Method',
            'scheme' => 'Scheme',
            'protocol' => 'Protocol',
            'port' => 'Port',
            'browser' => 'Browser',
            'language' => 'Language',
        ];
    }

    /**
     * {@inheritdoc}
     * @return LogvisitorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LogvisitorQuery(get_called_class());
    }

    public static function orderWithDay()
    {
        for ($i = 6; $i >= 0; $i--)
        {
            $startdate1 = strtotime("-$i days");
//            $start = "$startdate1 00:00:00.000";
//            $ent = "$startdate1 23:59:59.000";
            $query[] = Logvisitor::find()->where(['between', 'time', $startdate1 - 46200, $startdate1 + 46200])->asArray()->count();
        }

        return $query;
    }

}
