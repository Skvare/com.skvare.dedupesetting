{literal}
    <script type="text/javascript">
        CRM.$(function($) {
            $('.crm-dedupesetting-form-block-profile_dedupe_rule_group_id').insertAfter('.crm-uf-advancesetting-form-block-is_update_dupe');
        });
    </script>
{/literal}

<table class="form-layout-compressed" style="display: none">
    <tr class="crm-dedupesetting-form-block-profile_dedupe_rule_group_id">
        <td class="label">{$form.profile_dedupe_rule_group_id.label}</td>
        <td>{$form.profile_dedupe_rule_group_id.html}
        </td>
    </tr>
</table>