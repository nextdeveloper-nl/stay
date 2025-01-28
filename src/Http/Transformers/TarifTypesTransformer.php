<?php

namespace NextDeveloper\Stay\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Stay\Database\Models\TarifTypes;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Stay\Http\Transformers\AbstractTransformers\AbstractTarifTypesTransformer;

/**
 * Class TarifTypesTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class TarifTypesTransformer extends AbstractTarifTypesTransformer
{

    /**
     * @param TarifTypes $model
     *
     * @return array
     */
    public function transform(TarifTypes $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('TarifTypes', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('TarifTypes', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
