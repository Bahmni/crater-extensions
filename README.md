# crater-extensions

Crater is an open-source web & mobile app that helps you track expenses,
payments & create professional invoices & estimates. You can learn more about
Crater from the [crater's official website](https://craterapp.com/) and [github
repo crater-invoice/crater](https://github.com/crater-invoice/crater).

Bahmni is using Crater as a lightweight alternative to Odoo for invoicing &
billing purposes, as a part of the Bahmni-Lite project. You can read more about
it from this [presentation](https://bahmni.atlassian.net/l/cp/WkeRpuDc). The
development efforts are happending on the Bahmni fork of Crater [Bahmni/crater
bahmni-master branch](https://github.com/Bahmni/crater/tree/bahmni-master).

[Bahmni/crater-extensions](https://github.com/Bahmni/crater-extensions) is
created to store the bahmni-sepcific customizations for crater such as roles,
custom fields & translations, etc.


## How it works?

The crater-extensions project uses the `bahmni/crater-php` docker image with the
tag:`product` (this will eventually be replaced with `crater-invoice/crater`
once crater has the docker image published) as the base image and adds the
bahmni-specific customizations to it. The github actions will then create a new
docker image `bahmni/crater-php` with the current version as the tag and
publishes it to the dockerhub.

The helm charts are also created as the part of the github actions workflow and
are being published to use for creating the different environments. You can read
more about the automation and workflow from the [Bahmni on Cloud
Wiki](https://bahmni.atlassian.net/wiki/spaces/BAH/pages/2977824769/Bahmni+on+Cloud).


## Roles

Two roles have been created for Bahmni, `doctor` and `front desk`. Both the
roles have different permissions that includes view, create, edit, delete
different customers, items, invoices, payments, and estimates. The `doctor` role
has abilities to view the dashboard and financial reports.

You can create the roles and edit the permissions by [updating the `roles.json`
configuration](database/seeders/roles/roles.json). You check the Settings ->
Roles for checking all the permissions available.

You can refer to this [BAH-1559 ticket
discussion](https://bahmni.atlassian.net/browse/BAH-1559) for more information.


## Custom Fields

There are different bahmni-specific custom fields that are being used for
Invoices, Customers, etc.

You can create the custom fields by [updating the `custom_fields.json`
configuration](database/seeders/roles/custom_fields.json).


## To do

- [ ] Translations
- [ ] Reports
