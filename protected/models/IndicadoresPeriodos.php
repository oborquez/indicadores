<?php

/**
 * This is the model class for table "indicadores_periodos".
 *
 * The followings are the available columns in table 'indicadores_periodos':
 * @property integer $id
 * @property integer $id_grupo
 * @property string $periodo
 */
class IndicadoresPeriodos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return IndicadoresPeriodos the static model class
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
		return 'indicadores_periodos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_grupo, periodo', 'required'),
			array('id_grupo', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_grupo, periodo', 'safe', 'on'=>'search'),
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
			"valores" => array(self::HAS_MANY,"IndicadoresValores",'id_periodo'),
			"valor" => array(self::HAS_ONE,"IndicadoresValores",'id_periodo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_grupo' => 'Id Grupo',
			'periodo' => 'Periodo',
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
		$criteria->compare('id_grupo',$this->id_grupo);
		$criteria->compare('periodo',$this->periodo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}