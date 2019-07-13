<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

class Model extends \yii\base\Model
{
    /**
     * Creates and populates a set of models.
     *
     * @param string $modelClass
     * @param array $multipleModels
     * @return array
     * 
     * @property TurmaInfantil[] $turmaInfantil
     */
    public static function createMultiple($modelClass, $multipleModels = [])
    {
        $model    = new $modelClass;
        $formName = $model->formName();
        $post     = Yii::$app->request->post($formName);
        $models   = [];

        if (! empty($multipleModels)) {
            $keys = array_keys(ArrayHelper::map($multipleModels, 'idturma_item', 'idturma_item'));
            $multipleModels = array_combine($keys, $multipleModels);
        }

        if ($post && is_array($post)) {
            foreach ($post as $i => $item) {
                if (isset($item['idturma_item']) && !empty($item['idturma_item']) && isset($multipleModels[$item['idturma_item']])) {
                    $models[] = $multipleModels[$item['idturma_item']];
                } else {
                    $models[] = new $modelClass;
                }
            }
        }

        unset($model, $formName, $post);

        return $models;
    }
/**
     * @return \yii\db\ActiveQuery
     */
    public function getTurmaInfantil()
    {
        return $this->hasMany(Turma_item::className(), ['turma_id' => 'idturmainfantil']);
    }
}