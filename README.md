# Exclude Postmeta Form Keys

Prevent the `postmeta_form_keys` query from running on Product create and edit page loads within the WordPress admin.

This plugin is a cheap patch to prevent a long query from running when attempting to load the WordPress post editor page for a product. The `postmeta_form_keys` query is ran to populate the post meta fields dropdowns. If the post meta database table is large enough this query can take a long time to run. Even if the "Custom Fields" Screen Element is unchecked, the query still runs.

[![PHP Tests](https://github.com/basecardhero/exclude-postmeta-form-keys/actions/workflows/php-tests.yml/badge.svg)](https://github.com/basecardhero/exclude-postmeta-form-keys/actions/workflows/php-tests.yml) [![PHP Code Standards](https://github.com/basecardhero/exclude-postmeta-form-keys/actions/workflows/php-code-standards.yml/badge.svg)](https://github.com/basecardhero/exclude-postmeta-form-keys/actions/workflows/php-code-standards.yml) [![PHP Lint](https://github.com/basecardhero/exclude-postmeta-form-keys/actions/workflows/php-lint.yml/badge.svg)](https://github.com/basecardhero/exclude-postmeta-form-keys/actions/workflows/php-lint.yml) 

## Getting Started
