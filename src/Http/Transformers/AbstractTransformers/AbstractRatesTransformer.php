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
use NextDeveloper\Stay\Database\Models\Rates;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\IAM\Database\Scopes\AuthorizationScope;

/**
 * Class RatesTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class AbstractRatesTransformer extends AbstractTransformer
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
     * @param Rates $model
     *
     * @return array
     */
    public function transform(Rates $model)
    {
                                                $externalId = \NextDeveloper\\Database\Models\Externals::where('id', $model->external_id)->first();
                                                            $stayHotelId = \NextDeveloper\Stay\Database\Models\Hotels::where('id', $model->stay_hotel_id)->first();
                                                            $stayParentRateId = \NextDeveloper\Stay\Database\Models\ParentRates::where('id', $model->stay_parent_rate_id)->first();
                                                            $stayHotelContractId = \NextDeveloper\Stay\Database\Models\HotelContracts::where('id', $model->stay_hotel_contract_id)->first();
                        
        return $this->buildPayload(
            [
            'id'  =>  $model->uuid,
            'external_id'  =>  $externalId ? $externalId->uuid : null,
            'rate_mode'  =>  $model->rate_mode,
            'rate_type'  =>  $model->rate_type,
            'has_fixed_prices'  =>  $model->has_fixed_prices,
            'allows_zero_prices'  =>  $model->allows_zero_prices,
            'is_guaranteed'  =>  $model->is_guaranteed,
            'is_cost_validated'  =>  $model->is_cost_validated,
            'age_range_a_from'  =>  $model->age_range_a_from,
            'age_range_a_to'  =>  $model->age_range_a_to,
            'age_range_b_to'  =>  $model->age_range_b_to,
            'booking_start_date'  =>  $model->booking_start_date,
            'booking_end_date'  =>  $model->booking_end_date,
            'child_a_discount_1'  =>  $model->child_a_discount_1,
            'child_a_discount_2'  =>  $model->child_a_discount_2,
            'child_a_discount_3'  =>  $model->child_a_discount_3,
            'child_a_discount_4'  =>  $model->child_a_discount_4,
            'child_a_discount_5'  =>  $model->child_a_discount_5,
            'child_b_discount_1'  =>  $model->child_b_discount_1,
            'child_b_discount_2'  =>  $model->child_b_discount_2,
            'child_b_discount_3'  =>  $model->child_b_discount_3,
            'child_b_discount_4'  =>  $model->child_b_discount_4,
            'child_b_discount_5'  =>  $model->child_b_discount_5,
            'additional_discount_1'  =>  $model->additional_discount_1,
            'additional_discount_2'  =>  $model->additional_discount_2,
            'additional_discount_3'  =>  $model->additional_discount_3,
            'additional_discount_4'  =>  $model->additional_discount_4,
            'additional_discount_5'  =>  $model->additional_discount_5,
            'additional_discount_6'  =>  $model->additional_discount_6,
            'additional_discount_7'  =>  $model->additional_discount_7,
            'additional_discount_8'  =>  $model->additional_discount_8,
            'markup_percentage'  =>  $model->markup_percentage,
            'fixed_markup'  =>  $model->fixed_markup,
            'supplement_markup'  =>  $model->supplement_markup,
            'recommended_profit'  =>  $model->recommended_profit,
            'stay_hotel_id'  =>  $stayHotelId ? $stayHotelId->uuid : null,
            'stay_parent_rate_id'  =>  $stayParentRateId ? $stayParentRateId->uuid : null,
            'stay_hotel_contract_id'  =>  $stayHotelContractId ? $stayHotelContractId->uuid : null,
            'created_at'  =>  $model->created_at,
            'updated_at'  =>  $model->updated_at,
            'deleted_at'  =>  $model->deleted_at,
            ]
        );
    }

    public function includeStates(Rates $model)
    {
        $states = States::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($states, new StatesTransformer());
    }

    public function includeActions(Rates $model)
    {
        $input = get_class($model);
        $input = str_replace('\\Database\\Models', '', $input);

        $actions = AvailableActions::withoutGlobalScope(AuthorizationScope::class)
            ->where('input', $input)
            ->get();

        return $this->collection($actions, new AvailableActionsTransformer());
    }

    public function includeMedia(Rates $model)
    {
        $media = Media::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($media, new MediaTransformer());
    }

    public function includeSocialMedia(Rates $model)
    {
        $socialMedia = SocialMedia::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($socialMedia, new SocialMediaTransformer());
    }

    public function includeComments(Rates $model)
    {
        $comments = Comments::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($comments, new CommentsTransformer());
    }

    public function includeVotes(Rates $model)
    {
        $votes = Votes::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($votes, new VotesTransformer());
    }

    public function includeMeta(Rates $model)
    {
        $meta = Meta::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($meta, new MetaTransformer());
    }

    public function includePhoneNumbers(Rates $model)
    {
        $phoneNumbers = PhoneNumbers::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($phoneNumbers, new PhoneNumbersTransformer());
    }

    public function includeAddresses(Rates $model)
    {
        $addresses = Addresses::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($addresses, new AddressesTransformer());
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE






}
