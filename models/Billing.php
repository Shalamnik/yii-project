<?php 

namespace app\models;

use yii\db\ActiveRecord;

class Billing extends ActiveRecord
{
    public function getUsers()
    {
        $this->hasMany(Users::className(), ['id' => 'user_id']);
    }
}

?>