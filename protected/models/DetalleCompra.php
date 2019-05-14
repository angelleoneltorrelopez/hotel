<?php

/**
 * This is the model class for table "detalle_compra".
 *
 * The followings are the available columns in table 'detalle_compra':
 * @property integer $id_detalle_compra
 * @property integer $id_ingreso_bodega
 * @property integer $id_articulo
 * @property double $precio
 * @property integer $cantidad
 * @property double $total
 *
 * The followings are the available model relations:
 * @property Articulos $idArticulo
 * @property IngresoBodega $idIngresoBodega
 */
class DetalleCompra extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'detalle_compra';
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
			array('id_ingreso_bodega, id_articulo, precio, cantidad, total', 'required'),
			array('id_detalle_compra, id_ingreso_bodega, id_articulo, cantidad', 'numerical', 'integerOnly'=>true),
			array('precio, total', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_detalle_compra, id_ingreso_bodega, id_articulo, precio, cantidad, total', 'safe', 'on'=>'search'),
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
			'idArticulo' => array(self::BELONGS_TO, 'Articulos', 'id_articulo'),
			'idIngresoBodega' => array(self::BELONGS_TO, 'IngresoBodega', 'id_ingreso_bodega'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_detalle_compra' => 'Id Detalle Compra',
			'id_ingreso_bodega' => 'Id Ingreso Bodega',
			'id_articulo' => 'Id Articulo',
			'precio' => 'Precio',
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
		$criteria->with = array('idArticulo');

		$criteria->compare('id_detalle_compra',$this->id_detalle_compra);
		$criteria->compare('id_ingreso_bodega',$this->id_ingreso_bodega);
		$criteria->compare('idArticulo.nombre_articulo', $this->id_articulo, true);
		$criteria->compare('precio',$this->precio);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('total',$this->total);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function search2($ingreso_bodega)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_detalle_compra',$this->id_detalle_compra);
		$criteria->compare('id_ingreso_bodega',$ingreso_bodega);
		$criteria->compare('id_articulo',$this->id_articulo);
		$criteria->compare('precio',$this->precio);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('total',$this->total);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DetalleCompra the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
