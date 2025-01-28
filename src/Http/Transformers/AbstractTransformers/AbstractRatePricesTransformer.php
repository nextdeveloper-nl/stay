<?php

namespace NextDeveloper\Stay\Http\Transformers\AbstractTransformers;

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
use NextDeveloper\Stay\Database\Models\RatePrices;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\IAM\Database\Scopes\AuthorizationScope;

/**
 * Class RatePricesTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class AbstractRatePricesTransformer extends AbstractTransformer
{

    /**
     * @var array
     */
    protected array $availableIncludes = [
        'states',
        'actions',
        'media',
        'comments',
        'votes',
        'socialMedia',
        'phoneNumbers',
        'addresses',
        'meta'
    ];

    /**
     * @param RatePrices $model
     *
     * @return array
     */
    public function transform(RatePrices $model)
    {
                                                $stayRateId = \NextDeveloper\Stay\Database\Models\Rates::where('id', $model->stay_rate_id)->first();
                                                            $stayRoomTypeId = \NextDeveloper\Stay\Database\Models\RoomTypes::where('id', $model->stay_room_type_id)->first();
                                                            $externalId = \NextDeveloper\\Database\Models\Externals::where('id', $model->external_id)->first();
                                                            $iamAccountId = \NextDeveloper\IAM\Database\Models\Accounts::where('id', $model->iam_account_id)->first();
                                                            $iamUserId = \NextDeveloper\IAM\Database\Models\Users::where('id', $model->iam_user_id)->first();
                        
        return $this->buildPayload(
            [
            'id'  =>  $model->uuid,
            'stay_rate_id'  =>  $stayRateId ? $stayRateId->uuid : null,
            'stay_room_type_id'  =>  $stayRoomTypeId ? $stayRoomTypeId->uuid : null,
            'external_id'  =>  $externalId ? $externalId->uuid : null,
            'price_type'  =>  $model->price_type,
            'base_price'  =>  $model->base_price,
            'room_price'  =>  $model->room_price,
            'child_a_price_1'  =>  $model->child_a_price_1,
            'child_a_price_2'  =>  $model->child_a_price_2,
            'child_a_price_3'  =>  $model->child_a_price_3,
            'child_a_price_4'  =>  $model->child_a_price_4,
            'child_a_price_5'  =>  $model->child_a_price_5,
            'child_b_price_1'  =>  $model->child_b_price_1,
            'child_b_price_2'  =>  $model->child_b_price_2,
            'child_b_price_3'  =>  $model->child_b_price_3,
            'child_b_price_4'  =>  $model->child_b_price_4,
            'child_b_price_5'  =>  $model->child_b_price_5,
            'additional_price_1'  =>  $model->additional_price_1,
            'additional_price_2'  =>  $model->additional_price_2,
            'additional_price_3'  =>  $model->additional_price_3,
            'additional_price_4'  =>  $model->additional_price_4,
            'additional_price_5'  =>  $model->additional_price_5,
            'additional_price_6'  =>  $model->additional_price_6,
            'additional_price_7'  =>  $model->additional_price_7,
            'additional_price_8'  =>  $model->additional_price_8,
            'iam_account_id'  =>  $iamAccountId ? $iamAccountId->uuid : null,
            'iam_user_id'  =>  $iamUserId ? $iamUserId->uuid : null,
            'created_at'  =>  $model->created_at,
            'updated_at'  =>  $model->updated_at,
            'deleted_at'  =>  $model->deleted_at,
            ]
        );
    }

    public function includeStates(RatePrices $model)
    {
        $states = States::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($states, new StatesTransformer());
    }

    public function includeActions(RatePrices $model)
    {
        $input = get_class($model);
        $input = str_replace('\\Database\\Models', '', $input);

        $actions = AvailableActions::withoutGlobalScope(AuthorizationScope::class)
            ->where('input', $input)
            ->get();

        return $this->collection($actions, new AvailableActionsTransformer());
    }

    public function includeMedia(RatePrices $model)
    {
        $media = Media::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($media, new MediaTransformer());
    }

    public function includeSocialMedia(RatePrices $model)
    {
        $socialMedia = SocialMedia::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($socialMedia, new SocialMediaTransformer());
    }

    public function includeComments(RatePrices $model)
    {
        $comments = Comments::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($comments, new CommentsTransformer());
    }

    public function includeVotes(RatePrices $model)
    {
        $votes = Votes::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($votes, new VotesTransformer());
    }

    public function includeMeta(RatePrices $model)
    {
        $meta = Meta::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($meta, new MetaTransformer());
    }

    public function includePhoneNumbers(RatePrices $model)
    {
        $phoneNumbers = PhoneNumbers::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($phoneNumbers, new PhoneNumbersTransformer());
    }

    public function includeAddresses(RatePrices $model)
    {
        $addresses = Addresses::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($addresses, new AddressesTransformer());
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}
