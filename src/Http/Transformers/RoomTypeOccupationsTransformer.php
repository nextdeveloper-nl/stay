<?php

namespace NextDeveloper\Stay\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Stay\Database\Models\RoomTypeOccupations;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Stay\Http\Transformers\AbstractTransformers\AbstractRoomTypeOccupationsTransformer;

/**
 * Class RoomTypeOccupationsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class RoomTypeOccupationsTransformer extends AbstractRoomTypeOccupationsTransformer
{

    /**
     * @param RoomTypeOccupations $model
     *
     * @return array
     */
    public function transform(RoomTypeOccupations $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('RoomTypeOccupations', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('RoomTypeOccupations', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
