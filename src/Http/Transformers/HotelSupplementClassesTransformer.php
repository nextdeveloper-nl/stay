<?php

namespace NextDeveloper\Stay\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Stay\Database\Models\HotelSupplementClasses;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Stay\Http\Transformers\AbstractTransformers\AbstractHotelSupplementClassesTransformer;

/**
 * Class HotelSupplementClassesTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class HotelSupplementClassesTransformer extends AbstractHotelSupplementClassesTransformer
{

    /**
     * @param HotelSupplementClasses $model
     *
     * @return array
     */
    public function transform(HotelSupplementClasses $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('HotelSupplementClasses', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('HotelSupplementClasses', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
