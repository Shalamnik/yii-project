<?php 

namespace app\models;

use yii\db\ActiveRecord;

class Users extends ActiveRecord
{
    public function getBilling()
    {
        return $this->hasMany(Billing::className(), ['user_id' => 'id']);
    }
}

?>