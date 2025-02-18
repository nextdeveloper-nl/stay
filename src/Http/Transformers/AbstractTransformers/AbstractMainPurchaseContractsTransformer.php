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
use NextDeveloper\Stay\Database\Models\MainPurchaseContracts;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\IAM\Database\Scopes\AuthorizationScope;

/**
 * Class MainPurchaseContractsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class AbstractMainPurchaseContractsTransformer extends AbstractTransformer
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
     * @param MainPurchaseContracts $model
     *
     * @return array
     */
    public function transform(MainPurchaseContracts $model)
    {
                                                $commonCurrencyId = \NextDeveloper\Commons\Database\Models\Currencies::where('id', $model->common_currency_id)->first();
                                                            $parentStayMainPurchaseContractId = \NextDeveloper\\Database\Models\ParentStayMainPurchaseContracts::where('id', $model->parent_stay_main_purchase_contract_id)->first();
                                                            $stayTarifTypeId = \NextDeveloper\Stay\Database\Models\TarifTypes::where('id', $model->stay_tarif_type_id)->first();
                                                            $stayHotelId = \NextDeveloper\Stay\Database\Models\Hotels::where('id', $model->stay_hotel_id)->first();
                                                            $iamAccountId = \NextDeveloper\IAM\Database\Models\Accounts::where('id', $model->iam_account_id)->first();
                                                            $iamUserId = \NextDeveloper\IAM\Database\Models\Users::where('id', $model->iam_user_id)->first();
                        
        return $this->buildPayload(
            [
            'id'  =>  $model->uuid,
            'external_id'  =>  $model->external_id,
            'name'  =>  $model->name,
            'observations'  =>  $model->observations,
            'internal_observations'  =>  $model->internal_observations,
            'is_active'  =>  $model->is_active,
            'is_approved'  =>  $model->is_approved,
            'approved_at'  =>  $model->approved_at,
            'season_start_date'  =>  $model->season_start_date,
            'season_end_date'  =>  $model->season_end_date,
            'booking_start_date'  =>  $model->booking_start_date,
            'booking_end_date'  =>  $model->booking_end_date,
            'guarantee_start_date'  =>  $model->guarantee_start_date,
            'guarantee_end_date'  =>  $model->guarantee_end_date,
            'minimum_nights'  =>  $model->minimum_nights,
            'maximum_nights'  =>  $model->maximum_nights,
            'value'  =>  $model->value,
            'calculation_type'  =>  $model->calculation_type,
            'provider_commission'  =>  $model->provider_commission,
            'provider_commission_type'  =>  $model->provider_commission_type,
            'extranet_commission'  =>  $model->extranet_commission,
            'initial_quota'  =>  $model->initial_quota,
            'guaranteed_quota'  =>  $model->guaranteed_quota,
            'return_security_quota'  =>  $model->return_security_quota,
            'has_own_extranet_quota'  =>  $model->has_own_extranet_quota,
            'minimum_age'  =>  $model->minimum_age,
            'age_range_a_from'  =>  $model->age_range_a_from,
            'age_range_a_to'  =>  $model->age_range_a_to,
            'age_range_b_to'  =>  $model->age_range_b_to,
            'age_range_c_to'  =>  $model->age_range_c_to,
            'is_free_rate'  =>  $model->is_free_rate,
            'is_extranet_enabled'  =>  $model->is_extranet_enabled,
            'has_multi_markup'  =>  $model->has_multi_markup,
            'has_recommended_prices'  =>  $model->has_recommended_prices,
            'requires_immediate_payment'  =>  $model->requires_immediate_payment,
            'is_non_refundable'  =>  $model->is_non_refundable,
            'has_destination_payment'  =>  $model->has_destination_payment,
            'is_package_enabled'  =>  $model->is_package_enabled,
            'is_blocked'  =>  $model->is_blocked,
            'notify_integrator_bookings'  =>  $model->notify_integrator_bookings,
            'representative_name'  =>  $model->representative_name,
            'representative_position'  =>  $model->representative_position,
            'responsible_person'  =>  $model->responsible_person,
            'hotel_booking_email'  =>  $model->hotel_booking_email,
            'valuation_email'  =>  $model->valuation_email,
            'common_currency_id'  =>  $commonCurrencyId ? $commonCurrencyId->uuid : null,
            'parent_stay_main_purchase_contract_id'  =>  $parentStayMainPurchaseContractId ? $parentStayMainPurchaseContractId->uuid : null,
            'stay_tarif_type_id'  =>  $stayTarifTypeId ? $stayTarifTypeId->uuid : null,
            'stay_hotel_id'  =>  $stayHotelId ? $stayHotelId->uuid : null,
            'iam_account_id'  =>  $iamAccountId ? $iamAccountId->uuid : null,
            'iam_user_id'  =>  $iamUserId ? $iamUserId->uuid : null,
            'created_at'  =>  $model->created_at,
            'updated_at'  =>  $model->updated_at,
            'deleted_at'  =>  $model->deleted_at,
            ]
        );
    }

    public function includeStates(MainPurchaseContracts $model)
    {
        $states = States::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($states, new StatesTransformer());
    }

    public function includeActions(MainPurchaseContracts $model)
    {
        $input = get_class($model);
        $input = str_replace('\\Database\\Models', '', $input);

        $actions = AvailableActions::withoutGlobalScope(AuthorizationScope::class)
            ->where('input', $input)
            ->get();

        return $this->collection($actions, new AvailableActionsTransformer());
    }

    public function includeMedia(MainPurchaseContracts $model)
    {
        $media = Media::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($media, new MediaTransformer());
    }

    public function includeSocialMedia(MainPurchaseContracts $model)
    {
        $socialMedia = SocialMedia::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($socialMedia, new SocialMediaTransformer());
    }

    public function includeComments(MainPurchaseContracts $model)
    {
        $comments = Comments::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($comments, new CommentsTransformer());
    }

    public function includeVotes(MainPurchaseContracts $model)
    {
        $votes = Votes::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($votes, new VotesTransformer());
    }

    public function includeMeta(MainPurchaseContracts $model)
    {
        $meta = Meta::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($meta, new MetaTransformer());
    }

    public function includePhoneNumbers(MainPurchaseContracts $model)
    {
        $phoneNumbers = PhoneNumbers::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($phoneNumbers, new PhoneNumbersTransformer());
    }

    public function includeAddresses(MainPurchaseContracts $model)
    {
        $addresses = Addresses::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($addresses, new AddressesTransformer());
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE







}
