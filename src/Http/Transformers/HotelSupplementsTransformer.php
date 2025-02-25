<?php

namespace NextDeveloper\Stay\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Stay\Database\Models\HotelSupplements;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Stay\Http\Transformers\AbstractTransformers\AbstractHotelSupplementsTransformer;

/**
 * Class HotelSupplementsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class HotelSupplementsTransformer extends AbstractHotelSupplementsTransformer
{

    /**
     * @param HotelSupplements $model
     *
     * @return array
     */
    public function transform(HotelSupplements $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('HotelSupplements', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('HotelSupplements', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
