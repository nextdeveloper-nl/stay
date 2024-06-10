<?php

namespace NextDeveloper\Stay\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Stay\Database\Models\Rooms;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Stay\Http\Transformers\AbstractTransformers\AbstractRoomsTransformer;

/**
 * Class RoomsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class RoomsTransformer extends AbstractRoomsTransformer
{

    /**
     * @param Rooms $model
     *
     * @return array
     */
    public function transform(Rooms $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('Rooms', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('Rooms', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
