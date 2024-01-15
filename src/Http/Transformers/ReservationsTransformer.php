<?php

namespace NextDeveloper\Stay\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Stay\Database\Models\Reservations;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Stay\Http\Transformers\AbstractTransformers\AbstractReservationsTransformer;

/**
 * Class ReservationsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class ReservationsTransformer extends AbstractReservationsTransformer
{

    /**
     * @param Reservations $model
     *
     * @return array
     */
    public function transform(Reservations $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('Reservations', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('Reservations', $model->uuid, 'Transformed'),
            $transformed
        );

        return parent::transform($model);
    }
}
