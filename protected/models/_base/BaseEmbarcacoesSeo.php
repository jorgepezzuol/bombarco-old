<?php

/**
 * This is the model base class for the table "embarcacoes_seo".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "EmbarcacoesSeo".
 *
 * Columns in table "embarcacoes_seo" available as properties of the model,
 * followed by relations of table "embarcacoes_seo" available as properties of the model.
 *
 * @property integer $id
 * @property integer $embarcacao_modelos_id
 * @property integer $embarcacao_fabricantes_id
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property integer $follow
 * @property integer $index
 *
 * @property EmbarcacaoModelos $embarcacaoModelos
 * @property EmbarcacaoFabricantes $embarcacaoFabricantes
 */
abstract class BaseEmbarcacoesSeo extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'embarcacoes_seo';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'EmbarcacoesSeo|EmbarcacoesSeos', $n);
	}

	public static function representingColumn() {
		return 'title';
	}

	public function rules() {
		return array(
			array('embarcacao_modelos_id, embarcacao_fabricantes_id, follow, index', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>65),
			array('description', 'length', 'max'=>150),
			array('keywords', 'length', 'max'=>250),
			array('embarcacao_modelos_id, embarcacao_fabricantes_id, title, description, keywords, follow, index', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, embarcacao_modelos_id, embarcacao_fabricantes_id, title, description, keywords, follow, index', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'embarcacaoModelos' => array(self::BELONGS_TO, 'EmbarcacaoModelos', 'embarcacao_modelos_id'),
			'embarcacaoFabricantes' => array(self::BELONGS_TO, 'EmbarcacaoFabricantes', 'embarcacao_fabricantes_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'embarcacao_modelos_id' => null,
			'embarcacao_fabricantes_id' => null,
			'title' => Yii::t('app', 'Title'),
			'description' => Yii::t('app', 'Description'),
			'keywords' => Yii::t('app', 'Keywords'),
			'follow' => Yii::t('app', 'Follow'),
			'index' => Yii::t('app', 'Index'),
			'embarcacaoModelos' => null,
			'embarcacaoFabricantes' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('embarcacao_modelos_id', $this->embarcacao_modelos_id);
		$criteria->compare('embarcacao_fabricantes_id', $this->embarcacao_fabricantes_id);
		$criteria->compare('title', $this->title, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('keywords', $this->keywords, true);
		$criteria->compare('follow', $this->follow);
		$criteria->compare('index', $this->index);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}