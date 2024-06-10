<?php

namespace NextDeveloper\Stay\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Stay\Database\Models\RoomTypes;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Stay\Http\Transformers\AbstractTransformers\AbstractRoomTypesTransformer;

/**
 * Class RoomTypesTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class RoomTypesTransformer extends AbstractRoomTypesTransformer
{

    /**
     * @param RoomTypes $model
     *
     * @return array
     */
    public function transform(RoomTypes $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('RoomTypes', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('RoomTypes', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
