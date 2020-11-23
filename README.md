# com.skvare.dedupesetting

![Screenshot](/images/screenshot.png)

Functionality to change Deupe rule on different civicrm component which are hardcoded in civicrm core. This extension
 provide custom setting to change dedupe rule for profile, civicrm contribution page and uf match sync process.
 
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

This page provide your general setting to override Dedupe Rule for specific Component.

###Profile ID specific Setting
if you want profile ID specific Dedupe rule, Visit Profile Setting form then expand 'Advanced Settings' pannel,
You will see Dedupe Rule dropdown list. you can choose the rule as per fields available in the profile.

Each profile would have their dedupe setting.

![Screenshot](/images/profile_setting.png)


###Contribution Page ID Specific Setting:
if you want Contribution page ID specific Dedupe rule, Visit 'Manage Contribution Pages' -> Configure -> Include Profile

You will see Dedupe Rule dropdown list. you can choose the rule as per fields available in the included profile.

Each Contribution page would have their dedupe setting.

![Screenshot](/images/contribution_page_setting.png)


Here is overall workflow:

* Look for Page/form specific Dedupe Setting , if Rule configured then find the matching contact.
* If above step unable to find matching contact then General Dedupe setting get used.
* If there is fallback Dedupe Rule configured then it get used in case Main Rule configured in General setting unable
 to find matching contact.

