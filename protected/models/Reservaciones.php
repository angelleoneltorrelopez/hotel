<?php

/**
 * This is the model class for table "reservaciones".
 *
 * The followings are the available columns in table 'reservaciones':
 * @property integer $id_reservacion
 * @property string $fecha_reservacion
 * @property string $fecha_ingreso
 * @property string $fecha_salida
 * @property string $nombre_huesped
 * @property string $id_huesped
 * @property string $correo_huesped
 * @property string $nacionalidad_huesped
 * @property integer $tel_huesped
 * @property integer $cantidad_infantes
 * @property integer $cantidad_adultos
  * @property string $observaciones

 * @property string $total
 *
 * The followings are the available model relations:
 * @property DetalleResevacion[] $detalleResevacions
 */
class Reservaciones extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reservaciones';
	}
	public function verificar($attribute){
		if($this->fecha_salida<=$this->fecha_ingreso){
			$this->addError($attribute,'Fecha Salida debe ser mayor que Fecha Ingreso');
		}
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_ingreso, fecha_salida, id_huesped, nombre_huesped, correo_huesped, tel_huesped', 'required'),
			array('id_reservacion, id_huesped, tel_huesped, cantidad_infantes, cantidad_adultos', 'numerical', 'integerOnly'=>true),
			array('total', 'numerical'),
			array('observaciones', 'length', 'min'=>0),
			
			array('nombre_huesped, correo_huesped', 'length', 'max'=>255),
			array('nacionalidad_huesped', 'length', 'max'=>45),
			array('fecha_reservacion', 'safe'),
			array('fecha_ingreso','compare','compareValue'=>date('Y-m-d'),'operator'=>'>='),  //Esto compara que la fecha de finalización de licitación sea mayor a la fecha actual
			array('fecha_salida','compare','compareValue'=>date('Y-m-d'),'operator'=>'>'),  //Esto compara que la fecha de finalización de licitación sea mayor a la fecha actual
			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_reservacion, fecha_reservacion, fecha_ingreso, fecha_salida, nombre_huesped, correo_huesped, nacionalidad_huesped, tel_huesped, cantidad_infantes, cantidad_adultos, total', 'safe', 'on'=>'search'),
			array('fecha_salida','verificar'),
			
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'detalleResevacions' => array(self::HAS_MANY, 'DetalleResevacion', 'id_reservacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_reservacion' => 'Id',
			'fecha_reservacion' => 'Fecha',
			'fecha_ingreso' => 'Fecha Ingreso',
			'fecha_salida' => 'Fecha Salida',
			'nombre_huesped' => 'Nombre Huesped',
			'correo_huesped' => 'Correo',
			'nacionalidad_huesped' => 'Nacionalidad',
			'tel_huesped' => 'Tel',
			'cantidad_infantes' => 'Cantidad Infantes',
			'cantidad_adultos' => 'Cantidad Adultos',
			'observaciones' => 'Observaciones',
			
			'total' => 'Total',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_reservacion',$this->id_reservacion);
		$criteria->compare('fecha_reservacion',$this->fecha_reservacion,true);
		$criteria->compare('fecha_ingreso',$this->fecha_ingreso,true);
		$criteria->compare('fecha_salida',$this->fecha_salida,true);
		$criteria->compare('nombre_huesped',$this->nombre_huesped,true);
		$criteria->compare('correo_huesped',$this->correo_huesped,true);
		$criteria->compare('nacionalidad_huesped',$this->nacionalidad_huesped,true);
		$criteria->compare('tel_huesped',$this->tel_huesped);
		$criteria->compare('cantidad_infantes',$this->cantidad_infantes);
		$criteria->compare('cantidad_adultos',$this->cantidad_adultos);
		$criteria->compare('total',$this->total);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Reservaciones the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
