<?php

/**
 * This is the model class for table "ingreso_bodega".
 *
 * The followings are the available columns in table 'ingreso_bodega':
 * @property integer $id_ingreso
 * @property integer $id_proveedor
 * @property integer $id_solicitud_compra
 * @property integer $numero_factura
 * @property string $fecha_factura
 * @property string $fecha_ingreso
 * @property double $total
 *
 * The followings are the available model relations:
 * @property DetalleCompra[] $detalleCompras
 * @property Proveedores $idProveedor
 * @property SolicitudCompra $idSolicitudCompra
 */
class IngresoBodega extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ingreso_bodega';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_proveedor, id_solicitud_compra, numero_factura, fecha_factura', 'required'),
			array('id_ingreso, id_proveedor, id_solicitud_compra, numero_factura', 'numerical', 'integerOnly'=>true),
			array('total', 'numerical'),
			array('fecha_ingreso', 'safe'),
			array('fecha_factura','compare','compareValue'=>date('Y-m-d'),'operator'=>'<='),  //Esto compara que la fecha de finalización de licitación sea mayor a la fecha actual
			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_ingreso, id_proveedor, id_solicitud_compra, numero_factura, fecha_factura, fecha_ingreso, total', 'safe', 'on'=>'search'),
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
			'detalleCompras' => array(self::HAS_MANY, 'DetalleCompra', 'id_ingreso_bodega'),
			'idProveedor' => array(self::BELONGS_TO, 'Proveedores', 'id_proveedor'),
			'idSolicitudCompra' => array(self::BELONGS_TO, 'SolicitudCompra', 'id_solicitud_compra'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_ingreso' => 'Id',
			'id_proveedor' => 'Proveedor',
			'id_solicitud_compra' => 'Solicitud Compra',
			'numero_factura' => 'Numero Factura',
			'fecha_factura' => 'Fecha Factura',
			'fecha_ingreso' => 'Fecha Ingreso',
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

		$criteria->compare('id_ingreso',$this->id_ingreso);
		$criteria->with = array('idProveedor','idSolicitudCompra');
		$criteria->compare('idProveedor.nombre_proveedor',$this->id_proveedor);
		$criteria->compare('idSolicitudCompra.id_solicitud_compra',$this->id_solicitud_compra);
		$criteria->compare('numero_factura',$this->numero_factura);
		$criteria->compare('fecha_factura',$this->fecha_factura,true);
		$criteria->compare('fecha_ingreso',$this->fecha_ingreso,true);
		$criteria->compare('total',$this->total);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return IngresoBodega the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
