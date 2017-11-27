<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "currencies".
 *
 * @property integer $id
 * @property string $value
 * @property string $shortcut
 */
class Currencies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'currencies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['value', 'shortcut'], 'required'],
            [['value'], 'string', 'max' => 24],
            [['shortcut'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'value' => 'Value',
            'shortcut' => 'Shortcut',
        ];
    }
}
