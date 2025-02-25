<?php

namespace NextDeveloper\Stay\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Stay\Database\Models\HotelSupplementTypes;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Stay\Http\Transformers\AbstractTransformers\AbstractHotelSupplementTypesTransformer;

/**
 * Class HotelSupplementTypesTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class HotelSupplementTypesTransformer extends AbstractHotelSupplementTypesTransformer
{

    /**
     * @param HotelSupplementTypes $model
     *
     * @return array
     */
    public function transform(HotelSupplementTypes $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('HotelSupplementTypes', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('HotelSupplementTypes', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
