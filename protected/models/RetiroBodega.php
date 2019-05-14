<?php

/**
 * This is the model class for table "retiro_bodega".
 *
 * The followings are the available columns in table 'retiro_bodega':
 * @property integer $id_retiro_bodega
 * @property integer $id_empleado
 * @property string $fecha_solicitud
 * @property string $destino
 * @property integer $firma_solicitante
 * @property integer $firma_encargado_almacen
 * @property integer $firma_gerente
 *
 * The followings are the available model relations:
 * @property DetalleRetiroBodega[] $detalleRetiroBodegas
 * @property Empleados $idEmpleado
 */
class RetiroBodega extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'retiro_bodega';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_empleado, fecha_solicitud', 'required'),
			array('id_retiro_bodega, id_empleado, firma_solicitante, firma_encargado_almacen, firma_gerente', 'numerical', 'integerOnly'=>true),
			array('destino', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_retiro_bodega, id_empleado, fecha_solicitud, destino, firma_solicitante, firma_encargado_almacen, firma_gerente', 'safe', 'on'=>'search'),
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
			'detalleRetiroBodegas' => array(self::HAS_MANY, 'DetalleRetiroBodega', 'id_retiro_bodega'),
			'idEmpleado' => array(self::BELONGS_TO, 'Empleados', 'id_empleado'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_retiro_bodega' => 'Id',
			'id_empleado' => 'Empleado',
			'fecha_solicitud' => 'Fecha Solicitud',
			'destino' => 'Destino',
			'firma_solicitante' => 'Firma Solicitante',
			'firma_encargado_almacen' => 'Firma Encargado Almacen',
			'firma_gerente' => 'Firma Gerente',
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

		$criteria->together = true;
		$criteria->with = array('idEmpleado');
		$criteria->compare('id_retiro_bodega',$this->id_retiro_bodega,true);
		$criteria->compare('idEmpleado.nombre',$this->id_empleado,true);
		$criteria->compare('fecha_solicitud',$this->fecha_solicitud,true);
		$criteria->compare('destino',$this->destino,true);
		$criteria->compare('firma_solicitante',$this->firma_solicitante);
		$criteria->compare('firma_encargado_almacen',$this->firma_encargado_almacen);
		$criteria->compare('firma_gerente',$this->firma_gerente);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RetiroBodega the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
