<div class="help">
    {ts}Assign Dedupe Rule to Each component if needed, Each component have fallback rule, In case primary dedupe ruleunable to find the contact then fallback dedupe rule get used.{/ts} <br/>
    {ts}In case both the dedupe unable to find the find, then rule configured in civicrm core for respective functionality get used.{/ts}
    <br/>
    {ts}Check dedupe rule configuration by visiting <a href="civicrm/contact/deduperules?reset=1" target="_blank">Find and Merge Duplicate Contacts</a> setting page{/ts}
</div>

<div class="crm-submit-buttons">
{include file="CRM/common/formButtons.tpl" location="top"}
</div>

{foreach from=$elementNames item=elementName}
  <div class="crm-section">
    <div class="label">{$form.$elementName.label}</div>
    <div class="content">{$form.$elementName.html}</div>
    <div class="clear"></div>
  </div>
{/foreach}

<div class="crm-submit-buttons">
{include file="CRM/common/formButtons.tpl" location="bottom"}
</div>
