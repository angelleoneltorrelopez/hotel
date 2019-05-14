<?php

/**
 * This is the model class for table "disponibilidad".
 *
 * The followings are the available columns in table 'disponibilidad':
 * @property integer $id_detalle
 * @property string $entrada
 * @property string $salida
 * @property integer $tipo_habitacion
 * @property integer $habitacion
 */
class Disponibilidad extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'disponibilidad';
	}
	public function verificar($attribute){
		if($this->salida<=$this->entrada){
			$this->addError($attribute,'Fecha Salida debe ser mayor que Fecha Entrada');
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
			array('entrada, salida, tipo_habitacion', 'required'),
			array('id_detalle, tipo_habitacion, habitacion', 'numerical', 'integerOnly'=>true),
			array('entrada','compare','compareValue'=>date('Y-m-d'),'operator'=>'>='),  //Esto compara que la fecha de finalización de licitación sea mayor a la fecha actual
			array('salida','compare','compareValue'=>date('Y-m-d'),'operator'=>'>'),  //Esto compara que la fecha de finalización de licitación sea mayor a la fecha actual
			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('salida','verificar'),
			
			array('id_detalle, entrada, salida, tipo_habitacion, habitacion', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_detalle' => 'Id Detalle',
			'entrada' => 'Entrada',
			'salida' => 'Salida',
			'tipo_habitacion' => 'Tipo Habitacion',
			'habitacion' => 'Habitacion',
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

		$criteria->compare('id_detalle',$this->id_detalle);
		$criteria->compare('entrada',$this->entrada,true);
		$criteria->compare('salida',$this->salida,true);
		$criteria->compare('tipo_habitacion',$this->tipo_habitacion);
		$criteria->compare('habitacion',$this->habitacion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Disponibilidad the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
