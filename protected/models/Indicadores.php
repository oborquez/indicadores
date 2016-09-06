<?php

/**
 * This is the model class for table "indicadores".
 *
 * The followings are the available columns in table 'indicadores':
 * @property integer $id
 * @property integer $id_usuario
 * @property string $clave
 * @property string $nombre
 * @property string $descripcion
 * @property string $unidad
 *
 * The followings are the available model relations:
 * @property IndicadoresPeriodos $id0
 */
class Indicadores extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Indicadores the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'indicadores';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usuario, clave, nombre, descripcion, unidad', 'required'),
			array('id_usuario', 'numerical', 'integerOnly'=>true),
			array('unidad', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_usuario, clave, nombre, descripcion, unidad', 'safe', 'on'=>'search'),
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
			'periodos' => array(self::HAS_MANY, 'IndicadoresPeriodos', 'id_indicador'),
			'usuario' => array(self::BELONGS_TO, 'Usuarios', 'id_usuario'),
			'valores' => array(self::HAS_MANY,'IndicadoresValores','id_indicador'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_usuario' => 'Colaborador',
			'clave' => 'Clave',
			'nombre' => 'Nombre',
			'descripcion' => 'Descripcion',
			'unidad' => 'Unidad',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('clave',$this->clave,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('unidad',$this->unidad,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function umbrales()
	{
		$umbrales = array("danger"=>array(0,30),"warning"=>array(21,80),"success"=>array(81,100));
		return $umbrales;
	}

	public function  getUmbral($v)
	{
		$umbrales = $this->umbrales();
		foreach($umbrales as $k=>$u)
			if($v>=$u[0] && $v<=$u[1] )
				return $k;
	}
}