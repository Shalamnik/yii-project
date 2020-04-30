<?php 

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Users;

class ClientsController extends Controller
{
    public function actionIndex()
    {
        $query = Users::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $query_users = $query
            ->select('users.*')
            ->innerJoinWith('billing')
            ->where('billing.user_id = users.id')
            ->orderBy('billing.payment DESC')
            ->asArray()
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $users = [];
        foreach ($query_users as $user) {
            $users[$user['firstname']] = $user['billing'][0]['payment'];
        }

        return $this->render('index', [
            'users' => $users,
            'pagination' => $pagination
        ]);
    }
}

?>