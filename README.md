# com.skvare.dedupesetting

![Screenshot](/images/screenshot.png)

Functionality to chagne Deupe rule on different civicrm component which are hardcoded in civicrm core. This extension
 provide custom setting to change dedupe rule for profile, civicrm contribution page and uf match sync process.
 
 (This extension does not provide dedupe to specific profile id or contribution page id)

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

Visit civicrm/admin/dedupesettings?reset=1 for Dedue configuration.

