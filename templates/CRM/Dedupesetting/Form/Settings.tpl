<div class="help">
    <strong>{ts}This is Global Setting.{/ts}</strong><br/>
    {ts}Assign Dedupe Rule to Each component if needed, Each component has a fallback rule, In case the primary dedupe rule is unable to find the contact then fallback dedupe rule gets used.{/ts} <br/>
    {ts}In case both the dedupe unable to find the find, then rules configured in civicrm core for respective functionality get used.{/ts}
    <br/>
    {ts}Check dedupe rule configuration by visiting <a href="civicrm/contact/deduperules?reset=1" target="_blank">Find and Merge Duplicate Contacts</a> setting page.{/ts}<br/>
    {ts}There could be performance issues when you have millions of contacts in your database.{/ts}
</div>

<div class="help">
  <strong>{ts}Form specific Setting.{/ts}</strong><br/>
  <p>{ts}You can configure dedupe rules for each contribution page and profile. Form specific configuration will get higher priority.{/ts}</p>
  <p>{ts}Profile ID specific Setting: if you want profile ID specific Dedupe rule, Visit Profile Setting form then expand 'Advanced Settings' panel, You will see Dedupe Rule dropdown list. you can choose the rule as per fields available in the profile.{/ts}</p>
  <p>{ts}Contribution Page ID Specific Setting: if you want Contribution page ID specific Dedupe rule, Visit 'Manage Contribution Pages' -> Configure -> Include Profile. You will see the Dedupe Rule dropdown list. you can choose the rule as per fields available in the included profile.{/ts}</p>
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
