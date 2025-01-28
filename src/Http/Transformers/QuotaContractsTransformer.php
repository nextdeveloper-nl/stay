<?php

namespace NextDeveloper\Stay\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Stay\Database\Models\QuotaContracts;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Stay\Http\Transformers\AbstractTransformers\AbstractQuotaContractsTransformer;

/**
 * Class QuotaContractsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class QuotaContractsTransformer extends AbstractQuotaContractsTransformer
{

    /**
     * @param QuotaContracts $model
     *
     * @return array
     */
    public function transform(QuotaContracts $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('QuotaContracts', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('QuotaContracts', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
