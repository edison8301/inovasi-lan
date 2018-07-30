<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\models\User;
use miloschuman\highcharts\Highcharts;

$this->title = "Halaman Dashboard";

?>

<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title"></h3>
	</div>

	<div class="box-body">

		<?= Highcharts::widget([
		   'options' => [
		      	'title' => ['text' => 'Fruit Consumption'],
		      	'xAxis' => [
		        	'categories' => ['Apples', 'Bananas', 'Oranges']
		      	],
		      	'yAxis' => [
		        'title' => ['text' => 'Fruit eaten']
		      	],
		      	'series' => [
		        	['name' => 'Jane', 'data' => [1, 0, 4]],
		        	['name' => 'John', 'data' => [5, 7, 3]]
		      	]
		   ]
		]); ?>

	</div>
</div>