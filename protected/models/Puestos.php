<?php

/**
 * This is the model class for table "puestos".
 *
 * The followings are the available columns in table 'puestos':
 * @property integer $id
 * @property string $titulo
 * @property integer $departamento
 * @property string $salario_min
 * @property string $salario_max
 * @property string $bono
 * @property string $descripcion
 *
 * The followings are the available model relations:
 * @property Contratos[] $contratoses
 * @property Departamentos $departamento0
 */
class Puestos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'puestos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo, departamento, salario_min, salario_max', 'required'),
			array('departamento', 'numerical', 'integerOnly'=>true),
			array('titulo', 'length', 'max'=>255),
			array('salario_min, salario_max, bono', 'length', 'max'=>10),
			array('descripcion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, titulo, departamento, salario_min, salario_max, bono, descripcion', 'safe', 'on'=>'search'),
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
			'contratoses' => array(self::HAS_MANY, 'Contratos', 'puesto_trabajo'),
			'departamento0' => array(self::BELONGS_TO, 'Departamentos', 'departamento'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'titulo' => 'Titulo',
			'departamento' => 'Departamento',
			'salario_min' => 'Salario Min',
			'salario_max' => 'Salario Max',
			'bono' => 'Bono',
			'descripcion' => 'Descripcion',
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
		$criteria->with = array('departamento0');
		$criteria->compare('id',$this->id);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('departamento0.nombre',$this->departamento,true);
		$criteria->compare('salario_min',$this->salario_min,true);
		$criteria->compare('salario_max',$this->salario_max,true);
		$criteria->compare('bono',$this->bono,true);
		$criteria->compare('descripcion',$this->descripcion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Puestos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
