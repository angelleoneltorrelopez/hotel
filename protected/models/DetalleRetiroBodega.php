<?php

/**
 * This is the model class for table "detalle_retiro_bodega".
 *
 * The followings are the available columns in table 'detalle_retiro_bodega':
 * @property integer $id_detalle_retiro_bodega
 * @property integer $id_retiro_bodega
 * @property integer $id_articulo
 * @property integer $cantidad
 * @property string $fecha_retiro
 *
 * The followings are the available model relations:
 * @property RetiroBodega $idRetiroBodega
 */
class DetalleRetiroBodega extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'detalle_retiro_bodega';
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
			array('id_retiro_bodega, id_articulo', 'required'),
			array('id_detalle_retiro_bodega, id_retiro_bodega, id_articulo, cantidad', 'numerical', 'integerOnly'=>true),
			array('fecha_retiro', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_detalle_retiro_bodega, id_retiro_bodega, id_articulo, cantidad, fecha_retiro', 'safe', 'on'=>'search'),
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
			'idRetiroBodega' => array(self::BELONGS_TO, 'RetiroBodega', 'id_retiro_bodega'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_detalle_retiro_bodega' => 'Id Detalle Retiro Bodega',
			'id_retiro_bodega' => 'Id Retiro Bodega',
			'id_articulo' => 'Id Articulo',
			'cantidad' => 'Cantidad',
			'fecha_retiro' => 'Fecha Retiro',
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
		$criteria->compare('id_detalle_retiro_bodega',$this->id_detalle_retiro_bodega);
		$criteria->compare('id_retiro_bodega',$this->id_retiro_bodega);
		$criteria->compare('idArticulo.nombre_articulo', $this->id_articulo, true);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('fecha_retiro',$this->fecha_retiro,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function search2($retiro_bodega)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_detalle_retiro_bodega',$this->id_detalle_retiro_bodega);
		$criteria->compare('id_retiro_bodega',$retiro_bodega);
		$criteria->compare('id_articulo',$this->id_articulo);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('fecha_retiro',$this->fecha_retiro,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DetalleRetiroBodega the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
