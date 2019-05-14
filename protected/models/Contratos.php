<?php

/**
 * This is the model class for table "contratos".
 *
 * The followings are the available columns in table 'contratos':
 * @property integer $id
 * @property integer $tipo
 * @property integer $empleado
 * @property string $fecha_inicio
 * @property integer $horario
 * @property integer $puesto_trabajo
 * @property string $observaciones
 * @property integer $firma_RH
 * @property integer $firma_gerencia
 * @property string $fechacreacion
 *
 * The followings are the available model relations:
 * @property Empleados $empleado0
 * @property Horarios $horario0
 * @property Puestos $puestoTrabajo
 * @property TipoContrato $tipo0
 */
class Contratos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'contratos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo, empleado, fecha_inicio, horario, puesto_trabajo', 'required'),
			array('id, tipo, empleado, firma_RH, firma_gerencia, horario, puesto_trabajo', 'numerical', 'integerOnly'=>true),
			array('fecha_inicio', 'comparar_fechas', 'type' => 'date', 'dateFormat' => 'yyyy-MM-dd','except' => 'authsigned'),
			array('observaciones', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tipo, empleado, fecha_inicio, horario, puesto_trabajo,
			observaciones, firma_RH, firma_gerencia, fechacreacion', 'safe', 'on'=>'search'),
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
			'empleado0' => array(self::BELONGS_TO, 'Empleados', 'empleado'),
			'horario0' => array(self::BELONGS_TO, 'Horarios', 'horario'),
			'puestoTrabajo' => array(self::BELONGS_TO, 'Puestos', 'puesto_trabajo'),
			'tipo0' => array(self::BELONGS_TO, 'TipoContrato', 'tipo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tipo' => 'Tipo',
			'empleado' => 'Empleado',
			'fecha_inicio' => 'Fecha Inicio',
			'horario' => 'Horario',
			'puesto_trabajo' => 'Puesto Trabajo',
			'observaciones' => 'Observaciones',
			'firma_RH' => 'Recursos Humanos',
			'firma_gerencia' => 'Gerencia',
			'fechacreacion' => 'Fecha Creacion',
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
		$sort=new CSort();
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->together = true;
		$criteria->with = array('tipo0','empleado0','horario0','puestoTrabajo');
		$criteria->compare('tipo0.nombre', $this->tipo, true);
		$criteria->compare('empleado0.nombre', $this->empleado, true);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('horario0.nombre',$this->horario,true);
		$criteria->compare('puestoTrabajo.titulo',$this->puesto_trabajo,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('fechacreacion',$this->fechacreacion,true);
		if(Yii::app()->user->checkAccess("recep"))
		{
			$sort->defaultOrder='firma_gerencia ASC, firma_RH ASC';
		}
		//**************************************** RECURSOS HUMANOS ***************************************************
		if(Yii::app()->user->checkAccess("jefe_RRHH") && $criteria->compare('firma_RH','>=0'))
		{
			$criteria->compare('firma_RH',$this->firma_RH);
			$sort->defaultOrder='firma_RH ASC';
		}
		//**************************************** GERENTE ***************************************************
		if(Yii::app()->user->checkAccess("gerente") && $criteria->compare('firma_RH','=1'))
		{
			$criteria->compare('firma_gerencia',$this->firma_gerencia);
			$sort->defaultOrder='firma_gerencia ASC';
		}

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
		));
	}


	public function comparar_fechas($attribute,$params) {
		$fec = date("Y-m-d");
	if(!empty($this->attributes['fecha_inicio'])) {
	if(strtotime($this->attributes['fecha_inicio']) < strtotime($fec)) {
	$this->addError($attribute,'La fecha de inicio no puede ser menor a la fecha actual');}
	}
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Contratos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
