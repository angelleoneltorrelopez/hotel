<?php

/**
 * This is the model class for table "empleados".
 *
 * The followings are the available columns in table 'empleados':
 * @property integer $id
 * @property string $nombre
 * @property integer $telefono
 * @property string $direccion
 * @property string $fecha_nacimiento
 * @property string $observaciones
 *
 * The followings are the available model relations:
 * @property Contratos[] $contratoses
 * @property Mantenimiento[] $mantenimientos
 * @property RetiroBodega[] $retiroBodegas
 * @property SolicitudCompra[] $solicitudCompras
 * @property SolicitudPermiso[] $solicitudPermisos
 * @property SolicitudVacaciones[] $solicitudVacaciones
 * @property Usuarios[] $usuarioses
 */
class Empleados extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'empleados';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre', 'required'),
			array('id, telefono', 'numerical', 'integerOnly'=>true),
			array('nombre, direccion, observaciones', 'length', 'max'=>255),
			array('fecha_nacimiento', 'safe'),
			array('fecha_nacimiento','compare','compareValue'=>date('Y-m-d'),'operator'=>'<'),  //Esto compara que la fecha de finalización de licitación sea mayor a la fecha actual
			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, telefono, direccion, fecha_nacimiento, observaciones', 'safe', 'on'=>'search'),
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
			'contratoses' => array(self::HAS_MANY, 'Contratos', 'empleado'),
			'mantenimientos' => array(self::HAS_MANY, 'Mantenimiento', 'id_empleado'),
			'retiroBodegas' => array(self::HAS_MANY, 'RetiroBodega', 'id_empleado'),
			'solicitudCompras' => array(self::HAS_MANY, 'SolicitudCompra', 'id_empleado'),
			'solicitudPermisos' => array(self::HAS_MANY, 'SolicitudPermiso', 'empleado'),
			'solicitudVacaciones' => array(self::HAS_MANY, 'SolicitudVacaciones', 'empleado'),
			'usuarioses' => array(self::HAS_MANY, 'Usuarios', 'id_empleado'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'nombre' => 'Nombre',
			'telefono' => 'Telefono',
			'direccion' => 'Domicilio',
			'fecha_nacimiento' => 'Fecha Nacimiento',
			'observaciones' => 'Observaciones',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('telefono',$this->telefono);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('fecha_nacimiento',$this->fecha_nacimiento,true);
		$criteria->compare('observaciones',$this->observaciones,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Empleados the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
