<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

?>


<div class="container">
<br>
<br>
<br>
<span height="2px;" class="d-block bg-primary"></span>
<div class="row">
	<div class="col-sm-6">
		<div class="row">
		<div class="col-xs-3">
		<?php echo TbHtml::imageRounded(Yii::app()->baseUrl."/images/julio.png",'Logo Hotel',array('style' => 'width:80px; height:80px; margin-top:10px;', 'class'=>'pull-right')); ?>

	</div>
	<div class="col-xs-9">
		<div class="media-body">
		<h4 class="" style="color:#0a913d; font-family: Neue Haas Grotesk W01 Disp,Helvetica,Arial,Nimbus Sans L,sans-serif;
		font-weight: 700;">Julio Harrison</h4>
				<h5 class="text-primary">Analista</h5>
			<p class="text-secondary text-justify">Coordinador de personal a cargo del análisis del software.

		</div>
	</div>

		</div>
	</div>
	<div class="col-sm-6">
		<div class="row">

			<div class="col-xs-3">
			<?php echo TbHtml::imageRounded(Yii::app()->baseUrl."/images/luis.png",'Logo Hotel',array('style' => 'width:80px; height:80px; margin-top:10px;', 'class'=>'pull-right')); ?>

		</div>
		<div class="col-xs-9">
			<div class="media-body">

				<h4 class="" style="color:#0a913d; font-family: Neue Haas Grotesk W01 Disp,Helvetica,Arial,Nimbus Sans L,sans-serif;
    font-weight: 700;">Luis Cordón</h4>
				<h5 class="text-primary">Analista Auxiliar</h5>
				<p class="text-secondary text-justify">Mi rol fue el de identificar los requerimientos, pensar en una solución a los problemas y
				representarlo a través de diagramas UML como casos de uso y de secuencia, para visualizar de una forma más eficiente la complejidad que se esta pidiendo para las funcionalidades del software, las reglas, estructura y comportamiento de los objetos y procesos dentro del mismo.
			</div>
		</div>

		</div>

	</div>


</div>
<div class="row">
	<div class="col-sm-6">
		<div class="row">
		<div class="col-xs-3">
		<?php echo TbHtml::imageRounded(Yii::app()->baseUrl."/images/melanie.png",'Logo Hotel',array('style' => 'width:80px; height:80px; margin-top:10px;', 'class'=>'pull-right')); ?>

	</div>
	<div class="col-xs-9">
		<div class="media-body">
		<h4 class="" style="color:#0a913d; font-family: Neue Haas Grotesk W01 Disp,Helvetica,Arial,Nimbus Sans L,sans-serif;
		font-weight: 700;">Melanie Orellana</h4>
			<h5 class="text-primary">Desarrolladora</h5>
			<p class="text-secondary text-justify">Soy entusiasta de aprender nuevas tecnologías y de las ciencias de la computación.
			Me desempeñe como desarrolladora web y project manager, participando en la progración tanto back-end como front-end y en la integración de los componentes del sistema.

		</div>
	</div>

		</div>
	</div>
	<div class="col-sm-6">
		<div class="row">

			<div class="col-xs-3">
			<?php echo TbHtml::imageRounded(Yii::app()->baseUrl."/images/angel.png",'Logo Hotel',array('style' => 'width:80px;height:80px; margin-top:10px;', 'class'=>'pull-right')); ?>

		</div>
		<div class="col-xs-9">
			<div class="media-body">
			<h4 class="" style="color:#0a913d; font-family: Neue Haas Grotesk W01 Disp,Helvetica,Arial,Nimbus Sans L,sans-serif;
    font-weight: 700;">Angel Torre</h4>
					<h5 class="text-primary">Desarrollador</h5>
				<p class="text-secondary text-justify">Soy  un Greek apasionado por el desarrollo web, las tecnologías libres y compartir todos mis conocimientos. Mi participación fue de desarrollador tanto de Back end como de Front end, validaciones de datos, autorizaciones, notificaciones, reportes y creaciones de CRUD.
			</div>
		</div>

		</div>

	</div>


</div>
<br>
<br><br>
</div>

<?php
$baseUrl = Yii::app()->baseUrl;

  $cs = Yii::app()->getClientScript();


  $cs->registerCssFile($baseUrl.'/bootstrap.min.css');
	//$cs->registerCssFile($baseUrl.'/floating.css');
?>
