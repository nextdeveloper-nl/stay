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
use NextDeveloper\Stay\Database\Models\Providers;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\IAM\Database\Scopes\AuthorizationScope;

/**
 * Class ProvidersTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class AbstractProvidersTransformer extends AbstractTransformer
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
     * @param Providers $model
     *
     * @return array
     */
    public function transform(Providers $model)
    {
                                                $commonCountryId = \NextDeveloper\Commons\Database\Models\Countries::where('id', $model->common_country_id)->first();
                                                            $commonCurrencyId = \NextDeveloper\Commons\Database\Models\Currencies::where('id', $model->common_currency_id)->first();
                                                            $iamUserId = \NextDeveloper\IAM\Database\Models\Users::where('id', $model->iam_user_id)->first();
                                                            $iamAccountId = \NextDeveloper\IAM\Database\Models\Accounts::where('id', $model->iam_account_id)->first();
                        
        return $this->buildPayload(
            [
            'id'  =>  $model->uuid,
            'external_id'  =>  $model->external_id,
            'name'  =>  $model->name,
            'tax_number'  =>  $model->tax_number,
            'fiscal_name'  =>  $model->fiscal_name,
            'observations'  =>  $model->observations,
            'default_export_code'  =>  $model->default_export_code,
            'second_export_code'  =>  $model->second_export_code,
            'external_code'  =>  $model->external_code,
            'contact_person'  =>  $model->contact_person,
            'email'  =>  $model->email,
            'alternate_email'  =>  $model->alternate_email,
            'phone_1'  =>  $model->phone_1,
            'phone_2'  =>  $model->phone_2,
            'admin_phone'  =>  $model->admin_phone,
            'fax'  =>  $model->fax,
            'admin_contact'  =>  $model->admin_contact,
            'admin_email'  =>  $model->admin_email,
            'address'  =>  $model->address,
            'postal_code'  =>  $model->postal_code,
            'city'  =>  $model->city,
            'province'  =>  $model->province,
            'country_iso'  =>  $model->country_iso,
            'neighborhood'  =>  $model->neighborhood,
            'municipality'  =>  $model->municipality,
            'correspondence_address'  =>  $model->correspondence_address,
            'correspondence_postal_code'  =>  $model->correspondence_postal_code,
            'correspondence_city'  =>  $model->correspondence_city,
            'correspondence_region'  =>  $model->correspondence_region,
            'correspondence_country'  =>  $model->correspondence_country,
            'payment_days'  =>  $model->payment_days,
            'payment_type'  =>  $model->payment_type,
            'direct_payment_type'  =>  $model->direct_payment_type,
            'is_commission_agent'  =>  $model->is_commission_agent,
            'commission_percentage'  =>  $model->commission_percentage,
            'commission_tax'  =>  $model->commission_tax,
            'commission_without_taxes'  =>  $model->commission_without_taxes,
            'commission_before_taxes'  =>  $model->commission_before_taxes,
            'direct_payment_tax_percentage'  =>  $model->direct_payment_tax_percentage,
            'bank_account_description'  =>  $model->bank_account_description,
            'bank_account_number'  =>  $model->bank_account_number,
            'bank_account_type'  =>  $model->bank_account_type,
            'iban'  =>  $model->iban,
            'swift'  =>  $model->swift,
            'sort_code'  =>  $model->sort_code,
            'accounting_account'  =>  $model->accounting_account,
            'notify_request'  =>  $model->notify_request,
            'notify_confirmation'  =>  $model->notify_confirmation,
            'notify_cancellation'  =>  $model->notify_cancellation,
            'notify_modification'  =>  $model->notify_modification,
            'notify_direct_payment'  =>  $model->notify_direct_payment,
            'notify_request_without_quota'  =>  $model->notify_request_without_quota,
            'notify_cancel_without_quota'  =>  $model->notify_cancel_without_quota,
            'notify_confirm_without_quota'  =>  $model->notify_confirm_without_quota,
            'notify_success_as_pdf'  =>  $model->notify_success_as_pdf,
            'notify_pdf_attachment'  =>  $model->notify_pdf_attachment,
            'notify_request_external_res'  =>  $model->notify_request_external_res,
            'communication_language'  =>  $model->communication_language,
            'communication_text'  =>  $model->communication_text,
            'priority'  =>  $model->priority,
            'is_default'  =>  $model->is_default,
            'is_intracommunity'  =>  $model->is_intracommunity,
            'is_billing_exempt'  =>  $model->is_billing_exempt,
            'has_commission_in_income'  =>  $model->has_commission_in_income,
            'needs_assignment'  =>  $model->needs_assignment,
            'has_operative_voucher'  =>  $model->has_operative_voucher,
            'block_payments'  =>  $model->block_payments,
            'deactivate_voucher'  =>  $model->deactivate_voucher,
            'deactivate_success'  =>  $model->deactivate_success,
            'use_provider_base_currency'  =>  $model->use_provider_base_currency,
            'block_accommodation'  =>  $model->block_accommodation,
            'blocking_reason'  =>  $model->blocking_reason,
            'allow_credit_agencies'  =>  $model->allow_credit_agencies,
            'is_voxel_export'  =>  $model->is_voxel_export,
            'apply_commission_expenses'  =>  $model->apply_commission_expenses,
            'gross_payments'  =>  $model->gross_payments,
            'fiscal_regime_type'  =>  $model->fiscal_regime_type,
            'card_activation_date_type'  =>  $model->card_activation_date_type,
            'card_activation_days'  =>  $model->card_activation_days,
            'common_country_id'  =>  $commonCountryId ? $commonCountryId->uuid : null,
            'common_currency_id'  =>  $commonCurrencyId ? $commonCurrencyId->uuid : null,
            'iam_user_id'  =>  $iamUserId ? $iamUserId->uuid : null,
            'iam_account_id'  =>  $iamAccountId ? $iamAccountId->uuid : null,
            'created_at'  =>  $model->created_at,
            'updated_at'  =>  $model->updated_at,
            'deleted_at'  =>  $model->deleted_at,
            ]
        );
    }

    public function includeStates(Providers $model)
    {
        $states = States::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($states, new StatesTransformer());
    }

    public function includeActions(Providers $model)
    {
        $input = get_class($model);
        $input = str_replace('\\Database\\Models', '', $input);

        $actions = AvailableActions::withoutGlobalScope(AuthorizationScope::class)
            ->where('input', $input)
            ->get();

        return $this->collection($actions, new AvailableActionsTransformer());
    }

    public function includeMedia(Providers $model)
    {
        $media = Media::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($media, new MediaTransformer());
    }

    public function includeSocialMedia(Providers $model)
    {
        $socialMedia = SocialMedia::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($socialMedia, new SocialMediaTransformer());
    }

    public function includeComments(Providers $model)
    {
        $comments = Comments::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($comments, new CommentsTransformer());
    }

    public function includeVotes(Providers $model)
    {
        $votes = Votes::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($votes, new VotesTransformer());
    }

    public function includeMeta(Providers $model)
    {
        $meta = Meta::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($meta, new MetaTransformer());
    }

    public function includePhoneNumbers(Providers $model)
    {
        $phoneNumbers = PhoneNumbers::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($phoneNumbers, new PhoneNumbersTransformer());
    }

    public function includeAddresses(Providers $model)
    {
        $addresses = Addresses::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($addresses, new AddressesTransformer());
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE











}
