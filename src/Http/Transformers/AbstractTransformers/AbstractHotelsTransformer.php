<?php

namespace NextDeveloper\Stay\Http\Transformers\AbstractTransformers;

use NextDeveloper\Stay\Database\Models\Hotels;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;

/**
 * Class HotelsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class AbstractHotelsTransformer extends AbstractTransformer
{

    /**
     * @param Hotels $model
     *
     * @return array
     */
    public function transform(Hotels $model)
    {
                        $iamAccountId = \NextDeveloper\IAM\Database\Models\Accounts::where('id', $model->iam_account_id)->first();
                    $iamUserId = \NextDeveloper\IAM\Database\Models\Users::where('id', $model->iam_user_id)->first();
                    $commonCountryId = \NextDeveloper\Commons\Database\Models\Countries::where('id', $model->common_country_id)->first();
                    $foregroundMediaId = \NextDeveloper\\Database\Models\ForegroundMedia::where('id', $model->foreground_media_id)->first();
                    $backgroundMediaId = \NextDeveloper\\Database\Models\BackgroundMedia::where('id', $model->background_media_id)->first();
        
        return $this->buildPayload(
            [
            'id'  =>  $model->uuid,
            'iam_account_id'  =>  $iamAccountId ? $iamAccountId->uuid : null,
            'iam_user_id'  =>  $iamUserId ? $iamUserId->uuid : null,
            'name'  =>  $model->name,
            'description'  =>  $model->description,
            'address'  =>  $model->address,
            'facilities'  =>  $model->facilities,
            'email'  =>  $model->email,
            'phone'  =>  $model->phone,
            'city'  =>  $model->city,
            'common_country_id'  =>  $commonCountryId ? $commonCountryId->uuid : null,
            'foreground_media_id'  =>  $foregroundMediaId ? $foregroundMediaId->uuid : null,
            'background_media_id'  =>  $backgroundMediaId ? $backgroundMediaId->uuid : null,
            'latitude'  =>  $model->latitude,
            'longitude'  =>  $model->longitude,
            'created_at'  =>  $model->created_at ? $model->created_at->toIso8601String() : null,
            'updated_at'  =>  $model->updated_at ? $model->updated_at->toIso8601String() : null,
            'deleted_at'  =>  $model->deleted_at ? $model->deleted_at->toIso8601String() : null,
            ]
        );
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n




}
