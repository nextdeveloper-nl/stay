<?php

namespace NextDeveloper\Stay\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Stay\Database\Models\RoomTypeConsumerMappings;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Stay\Http\Transformers\AbstractTransformers\AbstractRoomTypeConsumerMappingsTransformer;

/**
 * Class RoomTypeConsumerMappingsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class RoomTypeConsumerMappingsTransformer extends AbstractRoomTypeConsumerMappingsTransformer
{

    /**
     * @param RoomTypeConsumerMappings $model
     *
     * @return array
     */
    public function transform(RoomTypeConsumerMappings $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('RoomTypeConsumerMappings', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('RoomTypeConsumerMappings', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
