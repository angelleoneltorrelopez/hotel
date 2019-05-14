<?php
/* @var $this SiteController */
$this->widget('bootstrap.widgets.TbCarousel', array(
	'items'=>array(
	array('image'=>'https://www.elfarohotel.it/data/jpg/hotel-el-faro-sardegna-alghero-ristorante-94.jpg', 'label'=>'Excelencia', 'caption'=>'Mantener las altas expectativas del cliente ante cualquier información'),		
	array('image'=>'https://www.elfarohotel.it/data/jpg/hotel-el-faro-sardegna-alghero-ristorante-92.jpg', 'label'=>'Conciencia Social', 'caption'=>'Contribuir al desarrollo socioeconómico y cultural de nuestra región'),
			array('image'=>'https://www.elfarohotel.it/data/jpg/hotel-el-faro-alghero-cena-001.jpg', 'label'=>'Calidad de Servicio', 'caption'=>'Promover altos niveles de rentabilidad y bienestar en nuestros colaboradores'),
),

)); 
$this->pageTitle=Yii::app()->name;
?>
<div class="container">
		<div class="row">
				<div class="col text-center">
				<h1>Bienvenido a <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
				</div>
		</div>
		<div class="row">
			<div class="col" style="display: flex;
			justify-content: center;">
				<?php echo TbHtml::imageCircle('https://cdn0.iconfinder.com/data/icons/building-vol-9/512/3-512.png','Logo Hotel',array('class'=>'pull-center','style' => 'height:180px;')); ?>
			</div>
		</div>
		<div class="row">
			<div class="col text-center">
			<h3 style="font-style: oblique;">
				¡Somos un equipo comprometido y entusiasta que brinda una excelente atención!</h3>
			</div>
		</div>
		<div class="row">
				<div class="col" style="display: flex;
			justify-content: center;">
			<div style="padding: 10px;width: 300px; height:100px;
		margin: 10px;">
			
				<?php echo TbHtml::linkButton('INGRESAR',
   			array('url'=>array('/site/login'),'block' => true, 'color' => TbHtml::BUTTON_COLOR_SUCCESS, 'size'=>TbHtml::BUTTON_SIZE_LARGE)); ?>
		</div>
				</div>
		</div>



<div class="row justify-content-md-center">
<div class="col-sm-6">
<div style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 100%;

	border-radius: 5px;">
	<img src="https://www.emirates247.com/polopoly_fs/1.321102.1452333233!/image/image.jpg" alt="Avatar" class="img-fluid" style="max-width:100%; height:auto; border-radius: 5px 5px 0 0;">

	<div style=" padding: 2px 16px;">
		<h4><b>Misión</b></h4> 
		<p class="text-justify"style="">Brindar a los clientes una estadía amigable y satisfactoria con una hospitalidad excelente,
		mostrando la historia y cultura que se encuentra a sus alrededores y con atención de personal altamente
		motivado y capacitado.</p> 
	</div>
</div>
</div>

<div class="col-sm-6" >
<div style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 100%;

	border-radius: 5px;">
  <img src="http://macaucloser.com/sites/default/files/styles/flexslider_full/public/The-St.-Regis-Macao-Cotai-Central--Ribbon-Cutting_Bulter_0.jpg?itok=xDWeTc3y" alt="Avatar" class="img-fluid" style="max-width:100%; height:auto; border-radius: 5px 5px 0 0;">
	<div class="text-justify" style=" padding: 2px 16px;">
		<h4><b>Visión</b></h4> 
		<p>Presentar una hospitalidad que cree experiencias únicas e inolvidables en los clientes,
		promoviendo nuestros valores socioculturales, morales, éticos y ambientales para que deseen volver a requerir de nuestros servicios.</p> 
	</div>
</div>
 
</div>
</div>
<br>
<br>

</div>
