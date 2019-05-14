<?php

/**
 * This is the model class for table "detalle_solicitud_compra".
 *
 * The followings are the available columns in table 'detalle_solicitud_compra':
 * @property integer $id_detalle_solicitud_compra
 * @property integer $id_solicitud_compra
 * @property integer $id_articulo
 * @property integer $cantidad
 * @property string $total
 *
 * The followings are the available model relations:
 * @property Articulos $idArticulo
 * @property SolicitudCompra $idSolicitudCompra
 */
class DetalleSolicitudCompra extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'detalle_solicitud_compra';
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
			array('id_solicitud_compra, id_articulo, cantidad', 'required'),
			array('id_solicitud_compra, id_articulo, cantidad', 'numerical', 'integerOnly'=>true),
			array('total', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_detalle_solicitud_compra, id_solicitud_compra, id_articulo, cantidad, total', 'safe', 'on'=>'search'),
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
			'idSolicitudCompra' => array(self::BELONGS_TO, 'SolicitudCompra', 'id_solicitud_compra'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_detalle_solicitud_compra' => 'Id Detalle Solicitud Compra',
			'id_solicitud_compra' => 'Id Solicitud Compra',
			'id_articulo' => 'Id Articulo',
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

		$criteria->compare('id_detalle_solicitud_compra',$this->id_detalle_solicitud_compra);
		$criteria->compare('id_solicitud_compra',$this->id_solicitud_compra);
		$criteria->compare('id_articulo',$this->id_articulo);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('total',$this->total,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function search2($solicitud)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_detalle_solicitud_compra',$this->id_detalle_solicitud_compra);
		$criteria->compare('id_solicitud_compra',$solicitud);
		$criteria->compare('id_articulo',$this->id_articulo);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('total',$this->total,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DetalleSolicitudCompra the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
