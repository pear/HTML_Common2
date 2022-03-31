# Changes in HTML_Common2

## 2.3.1 - 2022-03-31

This release is mostly needed for running [psalm] on HTML_QuickForm2 package 
* Type hints fixed to better reflect reality
* CS fixes, minor changes to `parseAttributes()` method

## 2.3.0 - 2022-03-26

* Upgraded tests, [PHPUnit Polyfills package] is used to run them on PHP 5.6 to PHP 8.1
* Test suite now runs on Github Actions rather than on Travis
* The package runs under PHP 8.1 without `E_DEPRECATED` messages (see [issue #3])
* Minimum required PHP version is now 5.6

[PHPUnit Polyfills package]: https://github.com/Yoast/PHPUnit-Polyfills
[issue #3]: https://github.com/pear/HTML_Common2/issues/3
[psalm]: https://psalm.dev/
