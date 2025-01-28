<?php

namespace NextDeveloper\Stay\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Stay\Database\Models\MainPurchaseContracts;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Stay\Http\Transformers\AbstractTransformers\AbstractMainPurchaseContractsTransformer;

/**
 * Class MainPurchaseContractsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class MainPurchaseContractsTransformer extends AbstractMainPurchaseContractsTransformer
{

    /**
     * @param MainPurchaseContracts $model
     *
     * @return array
     */
    public function transform(MainPurchaseContracts $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('MainPurchaseContracts', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('MainPurchaseContracts', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
