# Exclude Postmeta Form Keys for WooCommerce

Prevent the `postmeta_form_keys` query from running on Product or Order admin pages within WordPress.

[![PHP Tests](https://github.com/basecardhero/exclude-postmeta-form-keys/actions/workflows/php-tests.yml/badge.svg)](https://github.com/basecardhero/exclude-postmeta-form-keys/actions/workflows/php-tests.yml) [![PHP Code Standards](https://github.com/basecardhero/exclude-postmeta-form-keys/actions/workflows/php-code-standards.yml/badge.svg)](https://github.com/basecardhero/exclude-postmeta-form-keys/actions/workflows/php-code-standards.yml) [![PHP Lint](https://github.com/basecardhero/exclude-postmeta-form-keys/actions/workflows/php-lint.yml/badge.svg)](https://github.com/basecardhero/exclude-postmeta-form-keys/actions/workflows/php-lint.yml) 

## The Problem

When creating or editing a post type in WordPress, a query against the post meta table is ran that will populate the Custom Fields meta boxes. These can be toggled on and off using the Screen Options. However, this query is somewhat inefficient. When the postmeta table gets "large" (4 million+ rows in our case), the query can take 10 to 20 seconds.

This is what the query looks like by default.

```sql
SELECT DISTINCT meta_key
FROM wp_postmeta
WHERE meta_key NOT BETWEEN '_' AND '_z'
HAVING meta_key NOT LIKE '_%'
ORDER BY meta_key
LIMIT 30
```

## The Solution

WordPress provides the `postmeta_form_keys` filter allowing you to "pre-fetch" your own meta keys. By hooking into this filter and returning an empty array, WordPress will skip the costly query. In our case, we weren't using the custom post meta fields, so there was no harm done.

## Installation

1. Download the [latest release](https://github.com/basecardhero/exclude-postmeta-form-keys/releases/latest)
2. Follow the instructions provided by the [WordPress documentation](https://wordpress.org/documentation/article/manage-plugins/#upload-via-wordpress-admin).

## Development

_I usually develop on Mac using terminal. This is probably different on Windows._

1. Clone the repository into the `plugins` directory of your WordPress develop site.
2. Create a copy of the `.makenv` file. `cp .makenv.sample .makenv`.
3. Update `.makenv` with your test database information.
4. Run `composer test` to run integration tests.
5. Run `composer all` to run php linting, WordPress code standards, and phpunit all in one.
