<?php

namespace NextDeveloper\Stay\Http\Transformers\AbstractTransformers;

use NextDeveloper\Stay\Database\Models\Hotels;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Commons\Database\Models\Addresses;
use NextDeveloper\Commons\Database\Models\Comments;
use NextDeveloper\Commons\Database\Models\Meta;
use NextDeveloper\Commons\Database\Models\PhoneNumbers;
use NextDeveloper\Commons\Database\Models\SocialMedia;
use NextDeveloper\Commons\Database\Models\Votes;
use NextDeveloper\Commons\Database\Models\Media;
use NextDeveloper\Commons\Http\Transformers\MediaTransformer;
use NextDeveloper\Commons\Database\Models\AvailableActions;
use NextDeveloper\Commons\Http\Transformers\AvailableActionsTransformer;
use NextDeveloper\Commons\Database\Models\States;
use NextDeveloper\Commons\Http\Transformers\StatesTransformer;
use NextDeveloper\Commons\Http\Transformers\CommentsTransformer;
use NextDeveloper\Commons\Http\Transformers\SocialMediaTransformer;
use NextDeveloper\Commons\Http\Transformers\MetaTransformer;
use NextDeveloper\Commons\Http\Transformers\VotesTransformer;
use NextDeveloper\Commons\Http\Transformers\AddressesTransformer;
use NextDeveloper\Commons\Http\Transformers\PhoneNumbersTransformer;
use NextDeveloper\IAM\Database\Scopes\AuthorizationScope;

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
                                                $externalId = \NextDeveloper\\Database\Models\Externals::where('id', $model->external_id)->first();
                                                            $commonCityId = \NextDeveloper\Commons\Database\Models\Cities::where('id', $model->common_city_id)->first();
                                                            $commonCountryId = \NextDeveloper\Commons\Database\Models\Countries::where('id', $model->common_country_id)->first();
                                                            $commonCurrencyId = \NextDeveloper\Commons\Database\Models\Currencies::where('id', $model->common_currency_id)->first();
                                                            $foregroundMediaId = \NextDeveloper\Commons\Database\Models\Media::where('id', $model->foreground_media_id)->first();
                                                            $backgroundMediaId = \NextDeveloper\Commons\Database\Models\Media::where('id', $model->background_media_id)->first();
                                                            $stayProviderId = \NextDeveloper\Stay\Database\Models\Providers::where('id', $model->stay_provider_id)->first();
                                                            $iamAccountId = \NextDeveloper\IAM\Database\Models\Accounts::where('id', $model->iam_account_id)->first();
                                                            $iamUserId = \NextDeveloper\IAM\Database\Models\Users::where('id', $model->iam_user_id)->first();

        return $this->buildPayload(
            [
            'id'  =>  $model->uuid,
            'external_id'  =>  $externalId ? $externalId->uuid : null,
            'name'  =>  $model->name,
            'description'  =>  $model->description,
            'address'  =>  $model->address,
            'facilities'  =>  $model->facilities,
            'email'  =>  $model->email,
            'phone'  =>  $model->phone,
            'latitude'  =>  $model->latitude,
            'longitude'  =>  $model->longitude,
            'is_public'  =>  $model->is_public,
            'common_city_id'  =>  $commonCityId ? $commonCityId->uuid : null,
            'common_country_id'  =>  $commonCountryId ? $commonCountryId->uuid : null,
            'common_currency_id'  =>  $commonCurrencyId ? $commonCurrencyId->uuid : null,
            'foreground_media_id'  =>  $foregroundMediaId ? $foregroundMediaId->uuid : null,
            'background_media_id'  =>  $backgroundMediaId ? $backgroundMediaId->uuid : null,
            'stay_provider_id'  =>  $stayProviderId ? $stayProviderId->uuid : null,
            'iam_account_id'  =>  $iamAccountId ? $iamAccountId->uuid : null,
            'iam_user_id'  =>  $iamUserId ? $iamUserId->uuid : null,
            'created_at'  =>  $model->created_at,
            'updated_at'  =>  $model->updated_at,
            'deleted_at'  =>  $model->deleted_at,
            'is_public'  =>  $model->is_public,
            ]
        );
    }

    public function includeStates(Hotels $model)
    {
        $states = States::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($states, new StatesTransformer());
    }

    public function includeActions(Hotels $model)
    {
        $input = get_class($model);
        $input = str_replace('\\Database\\Models', '', $input);

        $actions = AvailableActions::withoutGlobalScope(AuthorizationScope::class)
            ->where('input', $input)
            ->get();

        return $this->collection($actions, new AvailableActionsTransformer());
    }

    public function includeMedia(Hotels $model)
    {
        $media = Media::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($media, new MediaTransformer());
    }

    public function includeSocialMedia(Hotels $model)
    {
        $socialMedia = SocialMedia::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($socialMedia, new SocialMediaTransformer());
    }

    public function includeComments(Hotels $model)
    {
        $comments = Comments::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($comments, new CommentsTransformer());
    }

    public function includeVotes(Hotels $model)
    {
        $votes = Votes::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($votes, new VotesTransformer());
    }

    public function includeMeta(Hotels $model)
    {
        $meta = Meta::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($meta, new MetaTransformer());
    }

    public function includePhoneNumbers(Hotels $model)
    {
        $phoneNumbers = PhoneNumbers::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($phoneNumbers, new PhoneNumbersTransformer());
    }

    public function includeAddresses(Hotels $model)
    {
        $addresses = Addresses::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($addresses, new AddressesTransformer());
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n







}
