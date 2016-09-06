<?php

/**
 * This is the model class for table "indicadores_valores_comentarios".
 *
 * The followings are the available columns in table 'indicadores_valores_comentarios':
 * @property integer $id
 * @property integer $id_valor
 * @property integer $id_usuario
 * @property string $fecha
 * @property string $comentario
 *
 * The followings are the available model relations:
 * @property IndicadoresValores $indicadoresValores
 */
class IndicadoresValoresComentarios extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return IndicadoresValoresComentarios the static model class
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
		return 'indicadores_valores_comentarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_valor, id_usuario, fecha, comentario', 'required'),
			array('id_valor, id_usuario', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_valor, id_usuario, fecha, comentario', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		//
		return array(
			'usuario' => array(self::BELONGS_TO,"Usuarios","id_usuario")
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_valor' => 'Id Valor',
			'id_usuario' => 'Id Usuario',
			'fecha' => 'Fecha',
			'comentario' => 'Comentario',
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
		$criteria->compare('id_valor',$this->id_valor);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('comentario',$this->comentario,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}