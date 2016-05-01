<?php

/*
 * This file is part of the plusarchive.com
 *
 * (c) Tomoki Morita <tmsongbooks215@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\models\query;

use yii\db\ActiveQuery;

class PlaylistQuery extends ActiveQuery
{
    /**
     * @param integer $status
     * @return PlaylistQuery
     */
    public function status($status)
    {
        return $this->andFilterWhere(['status' => $status]);
    }
}
