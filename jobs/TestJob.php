<?php 

namespace app\jobs;

use yii\base\Object;
use yii\queue\RetryableJob;
use app\models\Pegawai;

class TestJob extends Object implements RetryableJob
{
	public $id;
	public $url;
    
    public function execute($queue)
    {
		echo "Selesai \n";

		echo "Download File...";
        if (file_put_contents(time() . ".jpg", file_get_contents($this->url))) {
            echo " Sukses!\n";
        } else {
            echo " Gagal\n";
        }
        echo "Selesai \n";
    }

    public function canRetry($attempt, $error)
    {
        return true;
    }

    public function getTtr()
    {
        return 300;
    }
}