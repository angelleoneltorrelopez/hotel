<?php

/**
 * This is the model class for table "proveedores".
 *
 * The followings are the available columns in table 'proveedores':
 * @property integer $id_proveedor
 * @property string $nombre_proveedor
 * @property integer $nit_proveedor
 * @property string $direccion_proveedor
 * @property integer $telefono
 * @property string $fecha_creacion
 *
 * The followings are the available model relations:
 * @property IngresoBodega[] $ingresoBodegas
 */
class Proveedores extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'proveedores';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_proveedor, nit_proveedor', 'required'),
			array('nit_proveedor, telefono', 'numerical', 'integerOnly'=>true),
			array('nombre_proveedor, direccion_proveedor', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_proveedor, nombre_proveedor, nit_proveedor, direccion_proveedor, telefono, fecha_creacion', 'safe', 'on'=>'search'),
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
			'ingresoBodegas' => array(self::HAS_MANY, 'IngresoBodega', 'id_proveedor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_proveedor' => 'Id',
			'nombre_proveedor' => 'Nombre',
			'nit_proveedor' => 'Nit',
			'direccion_proveedor' => 'Direccion',
			'telefono' => 'Telefono',
			'fecha_creacion' => 'Fecha Creacion',
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

		$criteria->compare('id_proveedor',$this->id_proveedor);
		$criteria->compare('nombre_proveedor',$this->nombre_proveedor,true);
		$criteria->compare('nit_proveedor',$this->nit_proveedor);
		$criteria->compare('direccion_proveedor',$this->direccion_proveedor,true);
		$criteria->compare('telefono',$this->telefono);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Proveedores the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
