<?php

namespace NextDeveloper\Stay\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Stay\Database\Models\HotelProviderMappings;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Stay\Http\Transformers\AbstractTransformers\AbstractHotelProviderMappingsTransformer;

/**
 * Class HotelProviderMappingsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class HotelProviderMappingsTransformer extends AbstractHotelProviderMappingsTransformer
{

    /**
     * @param HotelProviderMappings $model
     *
     * @return array
     */
    public function transform(HotelProviderMappings $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('HotelProviderMappings', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('HotelProviderMappings', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
