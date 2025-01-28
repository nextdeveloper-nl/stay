<?php

namespace NextDeveloper\Stay\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Stay\Database\Models\HotelConsumerMappings;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Stay\Http\Transformers\AbstractTransformers\AbstractHotelConsumerMappingsTransformer;

/**
 * Class HotelConsumerMappingsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class HotelConsumerMappingsTransformer extends AbstractHotelConsumerMappingsTransformer
{

    /**
     * @param HotelConsumerMappings $model
     *
     * @return array
     */
    public function transform(HotelConsumerMappings $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('HotelConsumerMappings', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('HotelConsumerMappings', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
