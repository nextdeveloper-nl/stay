<?php

namespace NextDeveloper\Stay\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Stay\Database\Models\HotelContracts;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Stay\Http\Transformers\AbstractTransformers\AbstractHotelContractsTransformer;

/**
 * Class HotelContractsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class HotelContractsTransformer extends AbstractHotelContractsTransformer
{

    /**
     * @param HotelContracts $model
     *
     * @return array
     */
    public function transform(HotelContracts $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('HotelContracts', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('HotelContracts', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
