<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

class ModelRelatorio extends \yii\base\Model
{
    /**
     * Creates and populates a set of models.
     *
     * @param string $modelClass
     * @param array $multipleModels
     * @return array
     * 
     * @property Relatorio[] $relatorio
     */
    public static function createMultiple($modelClass, $multipleModels = [])
    {
        $model    = new $modelClass;
        $formName = $model->formName();
        $post     = Yii::$app->request->post($formName);
        $models   = [];

        if (! empty($multipleModels)) {
            $keys = array_keys(ArrayHelper::map($multipleModels, 'idrelatorio_item', 'idrelatorio_item'));
            $multipleModels = array_combine($keys, $multipleModels);
        }

        if ($post && is_array($post)) {
            foreach ($post as $i => $item) {
                if (isset($item['idrelatorio_item']) && !empty($item['idrelatorio_item']) && isset($multipleModels[$item['idrelatorio_item']])) {
                    $models[] = $multipleModels[$item['idrelatorio_item']];
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
    public function getRelatorio()
    {
        return $this->hasMany(Relatorio_item::className(), ['relatorio_id' => 'idrelatorio']);
    }
    
     public function getAluno()
    {
        return $this->hasMany(Relatorio_item::className(), ['aluno_id' => 'idaluno']);
    }
}
