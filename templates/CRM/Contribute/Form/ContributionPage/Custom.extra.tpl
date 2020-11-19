{literal}
    <script type="text/javascript">
        CRM.$(function($) {
            $('.crm-dedupesetting-form-block-contribute_dedupe_rule_group_id').insertBefore('.crm-contribution-contributionpage-custom-form-block-custom_pre_id');
        });
    </script>
{/literal}

<table class="form-layout-compressed" style="display: none">
    <tr class="crm-dedupesetting-form-block-contribute_dedupe_rule_group_id">
        <td class="label">{$form.contribute_dedupe_rule_group_id.label}</td>
        <td>{$form.contribute_dedupe_rule_group_id.html}
        </td>
    </tr>
</table>