<?php

/**
 * This is the model class for table "solicitud_compra".
 *
 * The followings are the available columns in table 'solicitud_compra':
 * @property integer $id_solicitud_compra
 * @property integer $id_empleado
 * @property string $fecha_solicitud
 * @property double $total_estimado
 * @property string $fecha_creacion
 * @property integer $firma_solicitante
 * @property integer $firma_jefe_inmediato
 * @property integer $firma_encargado_almacen
 *
 * The followings are the available model relations:
 * @property DetalleSolicitudCompra[] $detalleSolicitudCompras
 * @property IngresoBodega[] $ingresoBodegas
 * @property Empleados $idEmpleado
 */
class SolicitudCompra extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'solicitud_compra';
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
			array('id_solicitud_compra, id_empleado, firma_solicitante, firma_jefe_inmediato, firma_encargado_almacen', 'numerical', 'integerOnly'=>true),
			array('total_estimado', 'numerical'),
			array('fecha_creacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_solicitud_compra, id_empleado, fecha_solicitud, total_estimado, fecha_creacion, firma_solicitante, firma_jefe_inmediato, firma_encargado_almacen', 'safe', 'on'=>'search'),
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
			'detalleSolicitudCompras' => array(self::HAS_MANY, 'DetalleSolicitudCompra', 'id_solicitud_compra'),
			'ingresoBodegas' => array(self::HAS_MANY, 'IngresoBodega', 'id_solicitud_compra'),
			'empleado0' => array(self::BELONGS_TO, 'Empleados', 'id_empleado'),
			'firmas' => array(self::HAS_MANY, 'Firmas', 'id_firmas'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_solicitud_compra' => 'Id',
			'id_empleado' => 'Empleado',
			'fecha_solicitud' => 'Fecha Solicitud',
			'total_estimado' => 'Total Estimado',
			'fecha_creacion' => 'Fecha Creacion',
			'firma_solicitante' => 'Firma Solicitante',
			'firma_jefe_inmediato' => 'Firma Jefe Inmediato',
			'firma_encargado_almacen' => 'Firma Encargado Almacen',
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
		$criteria->with = array('empleado0');
		$criteria->compare('id_solicitud_compra',$this->id_solicitud_compra,true);
		$criteria->compare('empleado0.nombre',$this->id_empleado,true);
		$criteria->compare('fecha_solicitud',$this->fecha_solicitud,true);
		$criteria->compare('total_estimado',$this->total_estimado,true);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('firma_solicitante',$this->firma_solicitante);
		$criteria->compare('firma_jefe_inmediato',$this->firma_jefe_inmediato);
		$criteria->compare('firma_encargado_almacen',$this->firma_encargado_almacen);

		$session=new CHttpSession;
		$session->open();
		$session['SolicitudCompra_record']=$criteria;


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SolicitudCompra the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
