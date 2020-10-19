<?php

/**
 * This is the model base class for the table "transacoes".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Transacoes".
 *
 * Columns in table "transacoes" available as properties of the model,
 * followed by relations of table "transacoes" available as properties of the model.
 *
 * @property integer $id
 * @property integer $usuarios_id
 * @property string $tid
 * @property string $tid_externo
 * @property string $valor
 * @property string $descricao
 * @property string $data_criacao
 * @property string $data_confirmacao
 * @property string $formapagamento
 * @property integer $status
 * @property string $detalhes
 *
 * @property Ordens[] $ordens
 * @property Usuarios $usuarios
 */
abstract class BaseTransacoes extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'transacoes';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Transacoes|Transacoes', $n);
	}

	public static function representingColumn() {
		return 'tid';
	}

	public function rules() {
		return array(
			array('usuarios_id, tid, valor, data_criacao', 'required'),
			array('usuarios_id, status', 'numerical', 'integerOnly'=>true),
			array('tid, tid_externo', 'length', 'max'=>100),
			array('valor', 'length', 'max'=>10),
			array('descricao', 'length', 'max'=>140),
			array('formapagamento', 'length', 'max'=>45),
			array('data_confirmacao, detalhes, codigo_itau, data_vencimento_boleto', 'safe'),
			array('tid_externo, descricao, data_confirmacao, formapagamento, status, detalhes, codigo_itau, data_vencimento_boleto', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, usuarios_id, tid, tid_externo, valor, descricao, data_criacao, data_confirmacao, formapagamento, status, detalhes, codigo_itau, data_vencimento_boleto', 'safe', 'on'=>'search'),
		);
	}


	public function relations() {
		return array(
			'ordens' => array(self::HAS_MANY, 'Ordens', 'transacoes_id'),
			'usuarios' => array(self::BELONGS_TO, 'Usuarios', 'usuarios_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'usuarios_id' => null,
			'tid' => Yii::t('app', 'Tid'),
			'tid_externo' => Yii::t('app', 'Tid Externo'),
			'valor' => Yii::t('app', 'Valor'),
			'descricao' => Yii::t('app', 'Descricao'),
			'data_criacao' => Yii::t('app', 'Data Criacao'),
			'data_confirmacao' => Yii::t('app', 'Data Confirmacao'),
			'formapagamento' => Yii::t('app', 'Formapagamento'),
			'status' => Yii::t('app', 'Status'),
			'detalhes' => Yii::t('app', 'Detalhes'),
			'codigo_itau' => Yii::t('app', 'Codigo Itau'),
			'data_vencimento_boleto' => Yii::t('app', 'Data Vencimento Boleto'),
			'ordens' => null,
			'usuarios' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('usuarios_id', $this->usuarios_id);
		$criteria->compare('tid', $this->tid, true);
		$criteria->compare('tid_externo', $this->tid_externo, true);
		$criteria->compare('valor', $this->valor, true);
		$criteria->compare('descricao', $this->descricao, true);
		$criteria->compare('data_criacao', $this->data_criacao, true);
		$criteria->compare('data_confirmacao', $this->data_confirmacao, true);
		$criteria->compare('formapagamento', $this->formapagamento, true);
		$criteria->compare('status', $this->status);
		$criteria->compare('detalhes', $this->detalhes, true);
		$criteria->compare('codigo_itau', $this->codigo_itau, true);
		$criteria->compare('data_vencimento_boleto', $this->data_vencimento_boleto, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}