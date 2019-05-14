<?php

/**
 * This is the model class for table "detalle_resevacion".
 *
 * The followings are the available columns in table 'detalle_resevacion':
 * @property integer $id
 * @property integer $id_reservacion
 * @property integer $tipo_habitacion
 * @property integer $cantidad
 * @property double $total
 *
 * The followings are the available model relations:
 * @property Reservaciones $idReservacion
 * @property TipoHabitacion $tipoHabitacion
 */
class DetalleResevacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'detalle_resevacion';
	}
	public function verificarCantidad($attribute){
		if($this->cantidad<='0'){
			$this->addError($attribute,'Cantidad debe ser mayor a 0');
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
			array('id_reservacion, tipo_habitacion, cantidad', 'required'),
			array('id, id_reservacion, tipo_habitacion, cantidad', 'numerical', 'integerOnly'=>true),
			array('total', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_reservacion, tipo_habitacion, cantidad, total', 'safe', 'on'=>'search'),
			array('cantidad','verificarCantidad'),
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
			'idReservacion' => array(self::BELONGS_TO, 'Reservaciones', 'id_reservacion'),
			'tipoHabitacion' => array(self::BELONGS_TO, 'TipoHabitacion', 'tipo_habitacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_reservacion' => 'Id Reservacion',
			'tipo_habitacion' => 'Tipo Habitacion',
			'cantidad' => 'Cantidad',
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

		$criteria->together = true;
		$criteria->with = array('tipoHabitacion');
		$criteria->compare('id',$this->id,true);
		$criteria->compare('id_reservacion',$this->id_reservacion,true);
		$criteria->compare('tipoHabitacion.tipo_habitacioncol',$this->tipo_habitacion,true);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('total',$this->total);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function search2($reservacion)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('id_reservacion',$reservacion,true);
		$criteria->compare('tipo_habitacion',$this->tipo_habitacion,true);
		$criteria->compare('cantidad',$this->cantidad,true);
		$criteria->compare('total',$this->total,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DetalleResevacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
