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
use NextDeveloper\Stay\Database\Models\ProductGroups;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\IAM\Database\Scopes\AuthorizationScope;

/**
 * Class ProductGroupsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class AbstractProductGroupsTransformer extends AbstractTransformer
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
     * @param ProductGroups $model
     *
     * @return array
     */
    public function transform(ProductGroups $model)
    {
                                                $parentId = \NextDeveloper\\Database\Models\Parents::where('id', $model->parent_id)->first();
                                                            $zoneId = \NextDeveloper\\Database\Models\Zones::where('id', $model->zone_id)->first();
                                                            $channelId = \NextDeveloper\\Database\Models\Channels::where('id', $model->channel_id)->first();
                                                            $providerId = \NextDeveloper\\Database\Models\Providers::where('id', $model->provider_id)->first();
                                                            $priceListId = \NextDeveloper\\Database\Models\PriceLists::where('id', $model->price_list_id)->first();
                                                            $delegationId = \NextDeveloper\\Database\Models\Delegations::where('id', $model->delegation_id)->first();
                                                            $clientId = \NextDeveloper\\Database\Models\Clients::where('id', $model->client_id)->first();
                                                            $originZoneId = \NextDeveloper\\Database\Models\OriginZones::where('id', $model->origin_zone_id)->first();
                                                            $iamAccountId = \NextDeveloper\IAM\Database\Models\Accounts::where('id', $model->iam_account_id)->first();
                                                            $iamUserId = \NextDeveloper\IAM\Database\Models\Users::where('id', $model->iam_user_id)->first();
                        
        return $this->buildPayload(
            [
            'id'  =>  $model->uuid,
            'name'  =>  $model->name,
            'commission_rate'  =>  $model->commission_rate,
            'iva_commission_rate'  =>  $model->iva_commission_rate,
            'quickbooks_item'  =>  $model->quickbooks_item,
            'export_code'  =>  $model->export_code,
            'parent_id'  =>  $parentId ? $parentId->uuid : null,
            'trip_end_date'  =>  $model->trip_end_date,
            'trip_start_date'  =>  $model->trip_start_date,
            'end_date'  =>  $model->end_date,
            'start_date'  =>  $model->start_date,
            'max_children'  =>  $model->max_children,
            'min_children'  =>  $model->min_children,
            'max_adults'  =>  $model->max_adults,
            'min_adults'  =>  $model->min_adults,
            'zone_id'  =>  $zoneId ? $zoneId->uuid : null,
            'channel_id'  =>  $channelId ? $channelId->uuid : null,
            'room'  =>  $model->room,
            'status'  =>  $model->status,
            'provider_id'  =>  $providerId ? $providerId->uuid : null,
            'price_list_id'  =>  $priceListId ? $priceListId->uuid : null,
            'delegation_id'  =>  $delegationId ? $delegationId->uuid : null,
            'client_id'  =>  $clientId ? $clientId->uuid : null,
            'order_number'  =>  $model->order_number,
            'export_code_c'  =>  $model->export_code_c,
            'export_code_vre'  =>  $model->export_code_vre,
            'export_code_cre'  =>  $model->export_code_cre,
            'export_code_analytic'  =>  $model->export_code_analytic,
            'is_default'  =>  $model->is_default,
            'commission_account'  =>  $model->commission_account,
            'alternative_export_code'  =>  $model->alternative_export_code,
            'observations'  =>  $model->observations,
            'iva_commission_export_code'  =>  $model->iva_commission_export_code,
            'origin_zone_id'  =>  $originZoneId ? $originZoneId->uuid : null,
            'default_sender_email'  =>  $model->default_sender_email,
            'external_id'  =>  $model->external_id,
            'iam_account_id'  =>  $iamAccountId ? $iamAccountId->uuid : null,
            'iam_user_id'  =>  $iamUserId ? $iamUserId->uuid : null,
            'created_at'  =>  $model->created_at,
            'updated_at'  =>  $model->updated_at,
            'deleted_at'  =>  $model->deleted_at,
            ]
        );
    }

    public function includeStates(ProductGroups $model)
    {
        $states = States::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($states, new StatesTransformer());
    }

    public function includeActions(ProductGroups $model)
    {
        $input = get_class($model);
        $input = str_replace('\\Database\\Models', '', $input);

        $actions = AvailableActions::withoutGlobalScope(AuthorizationScope::class)
            ->where('input', $input)
            ->get();

        return $this->collection($actions, new AvailableActionsTransformer());
    }

    public function includeMedia(ProductGroups $model)
    {
        $media = Media::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($media, new MediaTransformer());
    }

    public function includeSocialMedia(ProductGroups $model)
    {
        $socialMedia = SocialMedia::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($socialMedia, new SocialMediaTransformer());
    }

    public function includeComments(ProductGroups $model)
    {
        $comments = Comments::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($comments, new CommentsTransformer());
    }

    public function includeVotes(ProductGroups $model)
    {
        $votes = Votes::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($votes, new VotesTransformer());
    }

    public function includeMeta(ProductGroups $model)
    {
        $meta = Meta::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($meta, new MetaTransformer());
    }

    public function includePhoneNumbers(ProductGroups $model)
    {
        $phoneNumbers = PhoneNumbers::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($phoneNumbers, new PhoneNumbersTransformer());
    }

    public function includeAddresses(ProductGroups $model)
    {
        $addresses = Addresses::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($addresses, new AddressesTransformer());
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE









}
