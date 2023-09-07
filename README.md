# com.skvare.dedupesetting

![Screenshot](/images/screenshot.png)

Functionality to change the Dedupe rule on different civicrm components that are
hardcoded in the civicrm core. This extension provides a custom setting to change
the duplicate rule for the profile, civicrm contribution page, and UF match sync process.

## Requirements

* PHP v7.0+
* CiviCRM (5.21)

## Installation (Web UI)

This extension has not yet been published for installation via the web UI.

## Installation (CLI, Zip)

Sysadmins and developers may download the `.zip` file for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
cd <extension-dir>
cv dl com.skvare.dedupesetting@https://github.com/Skvare/com.skvare.dedupesetting/archive/main.zip
```

## Installation (CLI, Git)

Sysadmins and developers may clone the [Git](https://en.wikipedia.org/wiki/Git) repo for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
git clone https://github.com/Skvare/com.skvare.dedupesetting.git
cv en dedupesetting
```

## Usage

Visit civicrm/admin/dedupesettings?reset=1 for Dedupe configuration.

This page provides your general setting to override the Dedupe Rule for a specific component.

###Profile ID specific Setting
If you want a profile ID-specific Dedupe rule, visit the Profile Setting form, then expand the 'Advanced Settings' panel.
You will see the Dedupe Rule drop-down list. You can choose the rule as per the fields available in the profile.

Each profile would have its own default setting.

![Screenshot](/images/profile_setting.png)


###Contribution Page ID Specific Setting:
If you want a contribution page ID-specific dedupe rule, visit 'Manage Contribution Pages' -> Configure -> Include Profile

You will see the Dedupe Rule drop-down list. You can choose the rule as per the fields available in the included profile.

Each contribution page would have its own setting.

![Screenshot](/images/contribution_page_setting.png)


Here is the overall workflow:

* Look for a page- or form-specific duplicate setting; if a rule is configured, then find the matching contact.
* If the above step is unable to find a matching contact, then the General Dedupe setting will be used.
* If there is a fallback Dedupe Rule configured, then it gets used in case the Main Rule is configured in the General setting but is unable to
  to find matching contacts.

