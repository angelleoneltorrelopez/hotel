<?php

/**
 * This is the model class for table "mantenimiento".
 *
 * The followings are the available columns in table 'mantenimiento':
 * @property integer $id
 * @property integer $id_empleado
 * @property string $fecha
 * @property integer $id_departamento
 * @property string $objeto
 * @property string $diagnostico
 * @property string $solucion
 * @property integer $autorizacion_jefe
 *
 * The followings are the available model relations:
 * @property Departamentos $idDepartamento
 * @property Empleados $idEmpleado
 */
class Mantenimiento extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mantenimiento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_empleado, fecha, id_departamento, objeto, diagnostico, solucion', 'required'),
			array('id_empleado, id_departamento, autorizacion_jefe', 'numerical', 'integerOnly'=>true),
			array('objeto', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_empleado, fecha, id_departamento, objeto, diagnostico, solucion, autorizacion_jefe', 'safe', 'on'=>'search'),
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
			'idDepartamento' => array(self::BELONGS_TO, 'Departamentos', 'id_departamento'),
			'idEmpleado' => array(self::BELONGS_TO, 'Empleados', 'id_empleado'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'id_empleado' => 'Empleado',
			'fecha' => 'Fecha',
			'id_departamento' => 'Departamento',
			'objeto' => 'Objeto',
			'diagnostico' => 'Diagnostico',
			'solucion' => 'Solucion',
			'autorizacion_jefe' => 'Autorizacion Jefe',
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
		$criteria->together = true;
		$criteria->with = array('idEmpleado','idDepartamento');
		$criteria->compare('idEmpleado.nombre', $this->id_empleado, true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('idDepartamento.nombre', $this->id_departamento, true);
		$criteria->compare('objeto',$this->objeto,true);
		$criteria->compare('diagnostico',$this->diagnostico,true);
		$criteria->compare('solucion',$this->solucion,true);
		$criteria->compare('autorizacion_jefe',$this->autorizacion_jefe);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Mantenimiento the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
