<?php

/**
 * This is the model class for table "articulos".
 *
 * The followings are the available columns in table 'articulos':
 * @property integer $id_articulo
 * @property string $nombre_articulo
 * @property integer $codigo_articulo
 * @property string $precio
 *
 * The followings are the available model relations:
 * @property Bodega[] $bodegas
 * @property DetalleCompra[] $detalleCompras
 * @property DetalleSolicitudCompra[] $detalleSolicitudCompras
 */
class Articulos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'articulos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_articulo, codigo_articulo, precio', 'required'),
			array('codigo_articulo', 'numerical', 'integerOnly'=>true),
			array('nombre_articulo', 'length', 'max'=>45),
			array('precio', 'numerical', 'allowEmpty' => true,'integerOnly' => false, 'min' => null, 'max' => null),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_articulo, nombre_articulo, codigo_articulo, precio', 'safe', 'on'=>'search'),
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
			'bodegas' => array(self::HAS_MANY, 'Bodega', 'id_articulo'),
			'detalleCompras' => array(self::HAS_MANY, 'DetalleCompra', 'id_articulo'),
			'detalleSolicitudCompras' => array(self::HAS_MANY, 'DetalleSolicitudCompra', 'id_articulo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_articulo' => 'Id',
			'nombre_articulo' => 'Nombre',
			'codigo_articulo' => 'Codigo',
			'precio' => 'Precio',
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

		$criteria->compare('id_articulo',$this->id_articulo);
		$criteria->compare('nombre_articulo',$this->nombre_articulo,true);
		$criteria->compare('codigo_articulo',$this->codigo_articulo);
		$criteria->compare('precio',$this->precio,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Articulos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
