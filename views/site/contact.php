<?php 

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<?php $form = ActiveForm::begin([
    'layout' => 'inline',
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'label' => 'col-sm-2',
            'wrapper' => 'col-sm-4',
            'error' => '',
            'hint' => '',
        ],
    ]
]); ?>

<div class="content" style="margin-top: -3%">
	<div class="title-post-detail">
		<h2>Kontak Kami</h2>
		<h2>Pusat Promosi Inovasi dan Pengembangan Kapasitas</h2>
		<div class="content">
			<div class="post-content">
				<div class="contact-list">
					<h4>Alamat.</h4>
					Kantor Lembaga Administrasi Negara Gedung B Lantai 4 
					Jalan Veteran No.10 Jakarta Pusat, Indonesia
				</div>
				
				<div class="contact-list">
					<h4>Telepon.</h4>
					(021) 3455021 - 5 ext. 127, ext. 128, ext. 130
				</div>
				
				<div class="contact-list">
					<h4>Faks.</h4>
					(021) 3459738
				</div>
				
				<div class="contact-list">
					<h4>Email.</h4>
					p2ipk@lan.go.id, p2ipk.inovasi@gmail.com
				</div>
			</div>

			<div>&nbsp;</div>

			<h2>Form Kontak</h2>

			<?= $form->field($model, 'name')->textInput(['placeholder' => 'Enter Name']) ?>

			<?= $form->field($model, 'email')->textInput(['placeholder' => 'Enter Email']) ?>

			<?= $form->field($model, 'subject')->textInput(['placeholder' => 'Enter Subject']) ?>

			<?= $form->field($model, 'body')->textArea(['rows' => 9, 'placeholder' => 'Enter Message']) ?>

			<div class="pull-right">
	            <?= Html::submitButton('Send',['class' => 'btn btn-lg btn-info']) ?>
	        </div>

		</div>
	</div>
</div>

<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>