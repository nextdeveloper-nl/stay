<?php

namespace NextDeveloper\Stay\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Stay\Database\Models\RoomCategories;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Stay\Http\Transformers\AbstractTransformers\AbstractRoomCategoriesTransformer;

/**
 * Class RoomCategoriesTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class RoomCategoriesTransformer extends AbstractRoomCategoriesTransformer
{

    /**
     * @param RoomCategories $model
     *
     * @return array
     */
    public function transform(RoomCategories $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('RoomCategories', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('RoomCategories', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
