<?php

namespace NextDeveloper\Stay\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Stay\Database\Models\SupplementTypes;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Stay\Http\Transformers\AbstractTransformers\AbstractSupplementTypesTransformer;

/**
 * Class SupplementTypesTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class SupplementTypesTransformer extends AbstractSupplementTypesTransformer
{

    /**
     * @param SupplementTypes $model
     *
     * @return array
     */
    public function transform(SupplementTypes $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('SupplementTypes', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('SupplementTypes', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
