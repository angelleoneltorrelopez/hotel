<?php

/**
 * This is the model class for table "solicitud_permiso".
 *
 * The followings are the available columns in table 'solicitud_permiso':
 * @property integer $id
 * @property integer $empleado
 * @property integer $tipo
 * @property string $fecha_solicitud
 * @property string $motivo
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property integer $cantidad_dias
 * @property integer $firma_solicitante
 * @property integer $firma_jefe_inmediato
 * @property integer $firma_RH
 * @property integer $firma_gerencia
 *
 * The followings are the available model relations:
 * @property Empleados $empleado0
 * @property TipoPermiso $tipo0
 */
class SolicitudPermiso extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'solicitud_permiso';
	}
	public function verificar($attribute){
		if($this->fecha_fin<=$this->fecha_inicio){
			$this->addError($attribute,'Fecha Fin debe ser mayor que Fecha Inicio');
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
			array('empleado, tipo, fecha_solicitud, motivo, fecha_inicio, fecha_fin', 'required'),
			array('id, empleado, tipo, cantidad_dias, firma_solicitante, firma_jefe_inmediato, firma_RH, firma_gerencia', 'numerical', 'integerOnly'=>true),
			//array('Caducidad', 'comparar_fechas', 'type' => 'date', 'dateFormat' => 'yyyy-MM-dd'),
			array('fecha_inicio','compare','compareValue'=>date('Y-m-d'),'operator'=>'>','except' => 'authsigned'),  //Esto compara que la fecha de finalización de licitación sea mayor a la fecha actual

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, empleado, tipo, fecha_solicitud, motivo, fecha_inicio, fecha_fin, cantidad_dias, firma_solicitante, firma_jefe_inmediato, firma_RH, firma_gerencia', 'safe', 'on'=>'search'),
			array('fecha_fin','verificar'),

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
			'tipo0' => array(self::BELONGS_TO, 'TipoPermiso', 'tipo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'empleado' => 'Empleado',
			'tipo' => 'Tipo',
			'fecha_solicitud' => 'Fecha Solicitud',
			'motivo' => 'Motivo',
			'fecha_inicio' => 'Fecha Inicio',
			'fecha_fin' => 'Fecha Fin',
			'cantidad_dias' => 'Cantidad Dias',
			'firma_solicitante' => 'Firma Solicitante',
			'firma_jefe_inmediato' => 'Jefe Inmediato',
			'firma_RH' => 'Recursos Humanos',
			'firma_gerencia' => 'Gerencia',
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

		$criteria->together = true;
		$criteria->with = array('empleado0','tipo0');
		$criteria->compare('id',$this->id);
		$criteria->compare('empleado0.nombre',$this->empleado,true);
		$criteria->compare('tipo0.nombre',$this->tipo,true);
		$criteria->compare('fecha_solicitud',$this->fecha_solicitud,true);
		$criteria->compare('motivo',$this->motivo,true);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_fin',$this->fecha_fin,true);
		$criteria->compare('cantidad_dias',$this->cantidad_dias);
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
		$criteria->compare('firma_solicitante',$this->firma_solicitante);
		$criteria->compare('firma_jefe_inmediato',$this->firma_jefe_inmediato);



		$session=new CHttpSession;
		$session->open();
		$session['SolicitudPermiso_record']=$criteria;

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
		));
	}

	public function comparar_fechas($attribute,$params) {
		$fec = date("Y-m-d");
if(!empty($this->attributes['fecha_inicio'])) {
if(strtotime($this->attributes['fecha_inicio']) < strtotime($fec)) {
$this->addError($attribute,'La Fecha de Inicio No Puede Ser Menor a la Fecha Actual');}
}
}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SolicitudPermiso the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
