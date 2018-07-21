<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\Pegawai;
use Yii;
use app\jobs\EmailJob;
use yii\console\Controller;
use yii\helpers\Console;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";
    }

    public function actionSend()
    {
    	$message = Yii::$app->mailer->compose("@app/mail/views/dev.php");
        $message->setFrom(['siska.lan@indomailer.net' => 'Sistem Informasi Kajian LAN RI']);
        $message->setSubject('Lorem');
        $message->setTo('fauzannoor98@gmail.com');
        $message->send();

        return $message;
    }

    public function actionTesEmail()
    {
        Yii::$app->queue->push(new \app\jobs\EmailJob([
            'email' => 'fauzannoor98@gmail.com',
            'subject' => 'Tes Email 2',
            'renderView' => 'dev.php',
        ]));
    }
}
