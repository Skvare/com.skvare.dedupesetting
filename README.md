# com.skvare.dedupesetting

![Screenshot](/images/screenshot.png)

## Overview

The Dedupe Settings extension provides advanced control over CiviCRM's duplicate detection and merging processes by allowing administrators to customize deduplication rules for specific components, profiles, and contribution pages. Unlike CiviCRM's core system which uses hardcoded dedupe rules, this extension offers flexible, context-specific duplicate detection that can be tailored to your organization's unique data patterns and business requirements.

**Key Features:**
- Override hardcoded dedupe rules in CiviCRM core components
- Profile-specific deduplication rule configuration
- Contribution page-specific dedupe rule settings
- UF match sync process customization
- General system-wide dedupe rule overrides
- Fallback rule configuration for comprehensive coverage
- Hierarchical rule application (specific → general → fallback)
- Support for all CiviCRM contact types and custom dedupe rules

## Benefits

- **Improved Data Quality:** Reduce duplicate contacts with context-appropriate matching
- **Flexible Configuration:** Different dedupe rules for different data entry points
- **Enhanced Accuracy:** Match contacts based on the specific fields available in each form
- **Operational Efficiency:** Automated duplicate detection without manual intervention
- **Customizable Logic:** Adapt deduplication to your organization's data patterns
- **Reduced False Positives:** Context-specific rules minimize incorrect matches
- **Streamlined Data Entry:** Better user experience with appropriate duplicate warnings

## Use Cases

This extension is valuable for organizations that need:

### Multi-Channel Data Collection
- **Website Forms:** Different matching criteria for web registrations
- **Event Registration:** Event-specific duplicate detection rules
- **Membership Signup:** Membership-focused deduplication logic
- **Donation Pages:** Donor-specific matching algorithms
- **Survey Responses:** Survey-appropriate duplicate checking

### Complex Organizational Structures
- **Multiple Departments:** Department-specific data entry rules
- **Regional Offices:** Location-based duplicate detection
- **Program-Specific Forms:** Program-appropriate matching criteria
- **Volunteer Management:** Volunteer-specific deduplication rules

### Data Integration Scenarios
- **Import Processes:** Custom rules for bulk data imports
- **API Integrations:** Tailored matching for external system data
- **Migration Projects:** Specialized rules for data consolidation
- **Third-Party Connections:** Integration-specific duplicate handling

## Requirements

- **CiviCRM:** 5.21 or higher
- **PHP:** 7.0 or higher (recommended 7.4+)
- **Permissions:** Administrative access to manage dedupe rules and system settings
- **Knowledge:** Understanding of CiviCRM's dedupe rule system and contact matching logic

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

## Configuration

### General Dedupe Settings

Configure system-wide dedupe rule overrides:

1. **Navigate to Dedupe Configuration:**
  - Visit: `/civicrm/admin/dedupesettings?reset=1`
  - Or: **Administer > System Settings > Dedupe Settings**

2. **Configure General Settings:**
  - **Main Dedupe Rule:** Primary rule for system-wide duplicate detection
  - **Fallback Dedupe Rule:** Secondary rule used when main rule finds no matches
  - **Component-Specific Rules:** Override rules for specific CiviCRM components

#### General Settings Options

**Main Dedupe Rule:**
- Select from existing dedupe rules in your system
- Applied as the default for all components unless overridden
- Used when no specific rule is configured for a form or component

**Fallback Dedupe Rule:**
- Secondary matching attempt when main rule finds no duplicates
- Provides broader matching criteria for comprehensive duplicate detection
- Helps capture matches that might be missed by stricter main rules

**Component Integration:**
- **Profile Processing:** Controls duplicate detection in profile submissions
- **Contribution Pages:** Manages donor duplicate detection
- **UF Match Sync:** Handles CMS user account matching
- **Event Registration:** Controls participant duplicate detection

### Profile-Specific Configuration

![Screenshot](/images/profile_setting.png)

Configure dedupe rules for individual profiles:

1. **Navigate to Profile Management:**
  - Go to **Administer > Customize Data and Screens > Profiles**
  - Select the profile to configure
  - Click **Settings**

2. **Access Advanced Settings:**
  - Expand the **Advanced Settings** panel
  - Locate the **Dedupe Rule** dropdown

3. **Select Appropriate Rule:**
  - Choose a dedupe rule that matches the fields in your profile
  - Consider the data quality and matching requirements
  - Test the rule with sample data before deploying

#### Profile Configuration Examples

**Membership Registration Profile:**
```
Profile Fields: First Name, Last Name, Email, Phone
Recommended Rule: "Individual - Fuzzy" or custom membership rule
Rationale: Comprehensive matching for new member detection
```

**Event Registration Profile:**
```
Profile Fields: First Name, Last Name, Email
Recommended Rule: "Individual - Strict"
Rationale: Exact matching to prevent duplicate registrations
```

**Contact Update Profile:**
```
Profile Fields: Email, Address, Phone
Recommended Rule: Custom rule based on stable identifiers
Rationale: Reliable matching for contact updates
```

**Volunteer Signup Profile:**
```
Profile Fields: Name, Email, Skills, Availability
Recommended Rule: Email-based rule with name fuzzy matching
Rationale: Prevent duplicate volunteer records
```

### Contribution Page Configuration

![Screenshot](/images/contribution_page_setting.png)

Configure dedupe rules for contribution pages:

1. **Navigate to Contribution Page Management:**
  - Go to **Contributions > Manage Contribution Pages**
  - Select the contribution page to configure
  - Click **Configure** → **Include Profiles**

2. **Configure Dedupe Settings:**
  - Locate the **Dedupe Rule** dropdown in the profile inclusion section
  - Select a rule appropriate for the donor information collected
  - Consider donation frequency and donor relationship patterns

### Rule Hierarchy and Application Logic

The extension applies dedupe rules in the following order:

```
1. Form/Page-Specific Rule (highest priority)
   ↓ (if no match found)
2. General Main Dedupe Rule
   ↓ (if no match found)
3. Fallback Dedupe Rule (broadest matching)
```


## Support and Contributing

- **Issues:** Report bugs and feature requests on [GitHub Issues](https://github.com/Skvare/com.skvare.dedupesetting/issues)

## Credits

Developed by [Skvare, LLC](https://skvare.com/contact) for the CiviCRM community.

## About Skvare

Skvare LLC specializes in CiviCRM development, Drupal integration, and providing technology solutions for nonprofit organizations, professional societies, membership-driven associations, and small businesses. We are committed to developing open source software that empowers our clients and the wider CiviCRM community.

**Contact Information**:
- Website: [https://skvare.com](https://skvare.com)
- Email: info@skvare.com
- GitHub: [https://github.com/Skvare](https://github.com/Skvare)

## Support

[Contact us](https://skvare.com/contact) for support or to learn more.

---

## Related Extensions

You might also be interested in other Skvare CiviCRM extensions:

- **Database Custom Field Check**: Prevents adding custom fields when table limits are reached
- **Image Resize**: Automatically resizes contact images for consistent display
- **Registration Button Label**: Customize button labels on event registration pages
- **Unlink User Account**: Safely unlink user accounts from contacts without deleting data

For a complete list of our open source contributions, visit our [GitHub organization page](https://github.com/Skvare).

