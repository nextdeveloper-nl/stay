<?php

namespace NextDeveloper\Stay\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Stay\Database\Models\OfferSupplementTypes;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Stay\Http\Transformers\AbstractTransformers\AbstractOfferSupplementTypesTransformer;

/**
 * Class OfferSupplementTypesTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class OfferSupplementTypesTransformer extends AbstractOfferSupplementTypesTransformer
{

    /**
     * @param OfferSupplementTypes $model
     *
     * @return array
     */
    public function transform(OfferSupplementTypes $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('OfferSupplementTypes', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('OfferSupplementTypes', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
