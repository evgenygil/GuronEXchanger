<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transactions".
 *
 * @property integer $id
 * @property string $hash
 * @property string $currency
 * @property string $currency_chng
 * @property double $value
 * @property string $bank
 * @property string $user
 * @property string $timestamp
 * @property integer $ready
 * @property integer $type
 */
class Transaction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transactions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hash', 'currency', 'currency_chng', 'value', 'bank', 'user', 'ready'], 'required'],
            [['value'], 'number'],
            [['timestamp'], 'safe'],
            [['ready'], 'integer'],
            [['type'], 'integer', 'max' => 32],
            [['hash'], 'string', 'max' => 32],
            [['currency', 'currency'], 'integer', 'max' => 96],
            [['bank', 'user'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hash' => 'Hash',
            'currency' => 'Currency',
            'currency_chng' => 'Currency Changing',
            'value' => 'Value',
            'bank' => 'Bank',
            'user' => 'User',
            'timestamp' => 'Timestamp',
            'ready' => 'Ready',
            'type' => 'Type',
        ];
    }

    /**
     * @inheritdoc
     * @return TransactionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransactionsQuery(get_called_class());
    }
}
