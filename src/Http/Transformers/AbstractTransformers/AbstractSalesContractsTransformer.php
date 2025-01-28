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
use NextDeveloper\Stay\Database\Models\SalesContracts;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\IAM\Database\Scopes\AuthorizationScope;

/**
 * Class SalesContractsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class AbstractSalesContractsTransformer extends AbstractTransformer
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
     * @param SalesContracts $model
     *
     * @return array
     */
    public function transform(SalesContracts $model)
    {
                                                $externalId = \NextDeveloper\\Database\Models\Externals::where('id', $model->external_id)->first();
                                                            $stayHotelId = \NextDeveloper\Stay\Database\Models\Hotels::where('id', $model->stay_hotel_id)->first();
                                                            $stayMainPurchaseContractId = \NextDeveloper\Stay\Database\Models\MainPurchaseContracts::where('id', $model->stay_main_purchase_contract_id)->first();
                                                            $stayTarifTypeId = \NextDeveloper\Stay\Database\Models\TarifTypes::where('id', $model->stay_tarif_type_id)->first();
                                                            $commonCurrencyId = \NextDeveloper\Commons\Database\Models\Currencies::where('id', $model->common_currency_id)->first();
                                                            $iamAccountId = \NextDeveloper\IAM\Database\Models\Accounts::where('id', $model->iam_account_id)->first();
                                                            $iamUserId = \NextDeveloper\IAM\Database\Models\Users::where('id', $model->iam_user_id)->first();
                        
        return $this->buildPayload(
            [
            'id'  =>  $model->uuid,
            'external_id'  =>  $externalId ? $externalId->uuid : null,
            'name'  =>  $model->name,
            'observations'  =>  $model->observations,
            'internal_observations'  =>  $model->internal_observations,
            'is_active'  =>  $model->is_active,
            'is_approved'  =>  $model->is_approved,
            'approved_at'  =>  $model->approved_at,
            'contract_type'  =>  $model->contract_type,
            'season_start_date'  =>  $model->season_start_date,
            'season_end_date'  =>  $model->season_end_date,
            'booking_start_date'  =>  $model->booking_start_date,
            'booking_end_date'  =>  $model->booking_end_date,
            'rates_start_date'  =>  $model->rates_start_date,
            'rates_end_date'  =>  $model->rates_end_date,
            'guarantee_start_date'  =>  $model->guarantee_start_date,
            'guarantee_end_date'  =>  $model->guarantee_end_date,
            'minimum_nights'  =>  $model->minimum_nights,
            'maximum_nights'  =>  $model->maximum_nights,
            'minimum_adults'  =>  $model->minimum_adults,
            'guaranteed_quota'  =>  $model->guaranteed_quota,
            'age_range_a_from'  =>  $model->age_range_a_from,
            'age_range_a_to'  =>  $model->age_range_a_to,
            'age_range_b_to'  =>  $model->age_range_b_to,
            'show_without_quota'  =>  $model->show_without_quota,
            'show_without_price'  =>  $model->show_without_price,
            'fetch_other_prices'  =>  $model->fetch_other_prices,
            'is_commissionable'  =>  $model->is_commissionable,
            'apply_markup'  =>  $model->apply_markup,
            'markup_value'  =>  $model->markup_value,
            'markup_priority'  =>  $model->markup_priority,
            'markup_tarification_type'  =>  $model->markup_tarification_type,
            'is_package_enabled'  =>  $model->is_package_enabled,
            'requires_destination_payment'  =>  $model->requires_destination_payment,
            'allows_multiple_accommodations'  =>  $model->allows_multiple_accommodations,
            'is_optional_supplement_mandatory'  =>  $model->is_optional_supplement_mandatory,
            'is_fair_template'  =>  $model->is_fair_template,
            'is_multi_fair_template'  =>  $model->is_multi_fair_template,
            'is_callcenter_only'  =>  $model->is_callcenter_only,
            'rounding_type'  =>  $model->rounding_type,
            'calculation_type'  =>  $model->calculation_type,
            'regularization_type'  =>  $model->regularization_type,
            'price_in_guarantee_invoice'  =>  $model->price_in_guarantee_invoice,
            'stay_hotel_id'  =>  $stayHotelId ? $stayHotelId->uuid : null,
            'stay_main_purchase_contract_id'  =>  $stayMainPurchaseContractId ? $stayMainPurchaseContractId->uuid : null,
            'stay_tarif_type_id'  =>  $stayTarifTypeId ? $stayTarifTypeId->uuid : null,
            'common_currency_id'  =>  $commonCurrencyId ? $commonCurrencyId->uuid : null,
            'iam_account_id'  =>  $iamAccountId ? $iamAccountId->uuid : null,
            'iam_user_id'  =>  $iamUserId ? $iamUserId->uuid : null,
            'created_at'  =>  $model->created_at,
            'updated_at'  =>  $model->updated_at,
            'deleted_at'  =>  $model->deleted_at,
            ]
        );
    }

    public function includeStates(SalesContracts $model)
    {
        $states = States::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($states, new StatesTransformer());
    }

    public function includeActions(SalesContracts $model)
    {
        $input = get_class($model);
        $input = str_replace('\\Database\\Models', '', $input);

        $actions = AvailableActions::withoutGlobalScope(AuthorizationScope::class)
            ->where('input', $input)
            ->get();

        return $this->collection($actions, new AvailableActionsTransformer());
    }

    public function includeMedia(SalesContracts $model)
    {
        $media = Media::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($media, new MediaTransformer());
    }

    public function includeSocialMedia(SalesContracts $model)
    {
        $socialMedia = SocialMedia::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($socialMedia, new SocialMediaTransformer());
    }

    public function includeComments(SalesContracts $model)
    {
        $comments = Comments::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($comments, new CommentsTransformer());
    }

    public function includeVotes(SalesContracts $model)
    {
        $votes = Votes::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($votes, new VotesTransformer());
    }

    public function includeMeta(SalesContracts $model)
    {
        $meta = Meta::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($meta, new MetaTransformer());
    }

    public function includePhoneNumbers(SalesContracts $model)
    {
        $phoneNumbers = PhoneNumbers::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($phoneNumbers, new PhoneNumbersTransformer());
    }

    public function includeAddresses(SalesContracts $model)
    {
        $addresses = Addresses::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($addresses, new AddressesTransformer());
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}
