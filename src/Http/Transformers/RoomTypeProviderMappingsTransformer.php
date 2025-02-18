<?php

namespace NextDeveloper\Stay\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Stay\Database\Models\RoomTypeProviderMappings;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Stay\Http\Transformers\AbstractTransformers\AbstractRoomTypeProviderMappingsTransformer;

/**
 * Class RoomTypeProviderMappingsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class RoomTypeProviderMappingsTransformer extends AbstractRoomTypeProviderMappingsTransformer
{

    /**
     * @param RoomTypeProviderMappings $model
     *
     * @return array
     */
    public function transform(RoomTypeProviderMappings $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('RoomTypeProviderMappings', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('RoomTypeProviderMappings', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
