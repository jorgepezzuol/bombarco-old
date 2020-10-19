<?php

/**
 * This is the model base class for the table "embarcacao_acessorios".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "EmbarcacaoAcessorios".
 *
 * Columns in table "embarcacao_acessorios" available as properties of the model,
 * followed by relations of table "embarcacao_acessorios" available as properties of the model.
 *
 * @property integer $id
 * @property integer $embarcacoes_id
 * @property integer $acessorios_id
 * @property string $chave
 * @property string $valor
 * @property integer $status
 *
 * @property Embarcacoes $embarcacoes
 * @property AcessorioModelos $acessorios
 */
abstract class BaseEmbarcacaoAcessorios extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'embarcacao_acessorios';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'EmbarcacaoAcessorios|EmbarcacaoAcessorioses', $n);
	}

	public static function representingColumn() {
		return 'chave';
	}

	public function rules() {
		return array(
			array('embarcacoes_id, acessorios_id', 'required'),
			array('embarcacoes_id, acessorios_id, status', 'numerical', 'integerOnly'=>true),
			array('chave, valor', 'length', 'max'=>45),
			array('chave, valor, status', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, embarcacoes_id, acessorios_id, chave, valor, status', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'embarcacoes' => array(self::BELONGS_TO, 'Embarcacoes', 'embarcacoes_id'),
			'acessorios' => array(self::BELONGS_TO, 'AcessorioModelos', 'acessorios_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'embarcacoes_id' => null,
			'acessorios_id' => null,
			'chave' => Yii::t('app', 'Chave'),
			'valor' => Yii::t('app', 'Valor'),
			'status' => Yii::t('app', 'Status'),
			'embarcacoes' => null,
			'acessorios' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('embarcacoes_id', $this->embarcacoes_id);
		$criteria->compare('acessorios_id', $this->acessorios_id);
		$criteria->compare('chave', $this->chave, true);
		$criteria->compare('valor', $this->valor, true);
		$criteria->compare('status', $this->status);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}