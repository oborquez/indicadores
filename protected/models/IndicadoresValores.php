<?php

/**
 * This is the model class for table "indicadores_valores".
 *
 * The followings are the available columns in table 'indicadores_valores':
 * @property integer $id
 * @property integer $id_indicador
 * @property integer $id_periodo
 * @property double $valor
 * @property integer $avalado
 *
 * The followings are the available model relations:
 * @property IndicadoresValoresComentarios $id0
 */
class IndicadoresValores extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return IndicadoresValores the static model class
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
		return 'indicadores_valores';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_indicador, id_periodo, valor, avalado', 'required'),
			array('id, id_indicador, id_periodo, avalado', 'numerical', 'integerOnly'=>true),
			array('valor', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_indicador, id_periodo, valor, avalado', 'safe', 'on'=>'search'),
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
			'periodo' => array(self::BELONGS_TO,'IndicadoresPeriodos','id_periodo'),	
			'indicador' => array(self::BELONGS_TO,"Indicadores",'id_indicador'),	
			'archivos' => array(self::HAS_MANY,'IndicadoresValoresArchivos','id_valor'),	
			'comentarios' => array(self::HAS_MANY,'IndicadoresValoresComentarios','id_valor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_indicador' => 'Id Indicador',
			'id_periodo' => 'Id Periodo',
			'valor' => 'Valor',
			'avalado' => 'Avalado',
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
		$criteria->compare('id_indicador',$this->id_indicador);
		$criteria->compare('id_periodo',$this->id_periodo);
		$criteria->compare('valor',$this->valor);
		$criteria->compare('avalado',$this->avalado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}