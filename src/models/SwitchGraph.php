<?php
/**
 * @link    http://hiqdev.com/hipanel-module-server
 * @license http://hiqdev.com/hipanel-module-server/license
 * @copyright Copyright (c) 2015 HiQDev
 */

namespace hipanel\modules\server\models;

use Yii;

class SwitchGraph extends \hipanel\base\Model
{
    use \hipanel\base\ModelTrait;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['graphs'], 'safe']
        ];
    }

    public function getServer()
    {
        return $this->hasOne(Server::class, ['id' => 'id']);
    }

    public function getImages()
    {
        return $this->hasMany(RrdImage::class, ['id' => 'id']);
    }
}