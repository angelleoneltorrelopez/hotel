<?php

/**
 * This is the model class for table "tipo_habitacion".
 *
 * The followings are the available columns in table 'tipo_habitacion':
 * @property integer $id_tipo_habitacion
 * @property string $tipo_habitacioncol
 * @property string $tarifa
 *
 * The followings are the available model relations:
 * @property DetalleResevacion[] $detalleResevacions
 * @property Habitaciones[] $habitaciones
 */
class TipoHabitacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tipo_habitacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo_habitacioncol, tarifa', 'required'),
			array('tipo_habitacioncol, tarifa', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_tipo_habitacion, tipo_habitacioncol, tarifa', 'safe', 'on'=>'search'),
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
			'detalleResevacions' => array(self::HAS_MANY, 'DetalleResevacion', 'tipo_habitacion'),
			'habitaciones' => array(self::HAS_MANY, 'Habitaciones', 'tipo_habitacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_tipo_habitacion' => 'Id',
			'tipo_habitacioncol' => 'Tipo',
			'tarifa' => 'Tarifa',
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

		$criteria->compare('id_tipo_habitacion',$this->id_tipo_habitacion);
		$criteria->compare('tipo_habitacioncol',$this->tipo_habitacioncol,true);
		$criteria->compare('tarifa',$this->tarifa,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TipoHabitacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
