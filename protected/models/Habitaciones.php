<?php

/**
 * This is the model class for table "habitaciones".
 *
 * The followings are the available columns in table 'habitaciones':
 * @property integer $id_habitacion
 * @property integer $tipo_habitacion
 * @property string $numero
 *
 * The followings are the available model relations:
 * @property TipoHabitacion $tipoHabitacion
 */
class Habitaciones extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'habitaciones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo_habitacion, numero', 'required'),
			array('numero','unique'),
			array('tipo_habitacion', 'numerical', 'integerOnly'=>true),
			array('numero', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_habitacion, tipo_habitacion, numero', 'safe', 'on'=>'search'),
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
			'tipoHabitacion' => array(self::BELONGS_TO, 'TipoHabitacion', 'tipo_habitacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_habitacion' => 'Id',
			'tipo_habitacion' => 'Tipo Habitacion',
			'numero' => 'Numero',
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

		$criteria->compare('id_habitacion',$this->id_habitacion);
		$criteria->together = true;
		$criteria->with = array('tipoHabitacion');
		$criteria->compare('tipoHabitacion.tipo_habitacioncol', $this->tipo_habitacion, true);
		$criteria->compare('numero',$this->numero,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Habitaciones the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
