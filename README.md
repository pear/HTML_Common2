# HTML_Common2

[![Build Status](https://github.com/pear/HTML_Common2/workflows/Continuous%20Integration/badge.svg?branch=trunk)](https://github.com/pear/HTML_Common2/actions?query=branch%3Atrunk+workflow%3A%22Continuous+Integration%22)

This is a repository for [PEAR HTML_Common2] package that has been migrated from [PEAR SVN].

The package contains an abstract `HTML_Common2` class that implements methods for HTML attributes handling and
setting document-wide options. It is quite helpful as a building block for packages generating HTML and is currently
used as such by [PEAR HTML_QuickForm2] package. The package is a PHP5 rewrite of [PEAR HTML_Common].

Features:

 * Allows [easy setting, removing, merging of HTML attributes](http://pear.php.net/manual/en/package.html.html-common2.attributes.php),
   working with CSS classes;
 * Provides means to parse and generate HTML attribute strings;
 * Global [document options](http://pear.php.net/manual/en/package.html.html-common2.options.php):
   charset, linebreak and indentation characters;
 * Methods to handle indentation and HTML comments (useful in subclasses).

Please report all issues via the [PEAR bug tracker] or [Github issues].

[End-user documentation](http://pear.php.net/manual/en/package.html.html-common2.php) as well as
[generated API documentation](http://pear.php.net/package/HTML_Common2/docs/latest/) for current release is available
on PEAR website.

Pull requests are welcome.

[PEAR HTML_Common2]: http://pear.php.net/package/HTML_Common2/
[PEAR HTML_Common]: http://pear.php.net/package/HTML_Common/
[PEAR HTML_QuickForm2]: http://pear.php.net/package/HTML_QuickForm2/
[PEAR SVN]: https://svn.php.net/repository/pear/packages/HTML_Common2
[PEAR bug tracker]: http://pear.php.net/bugs/search.php?cmd=display&package_name[]=HTML_Common2
[Github issues]: https://github.com/pear/HTML_Common2/issues

## Installation

The package may be installed either with PEAR

    $ pear install HTML_Common2

or with composer

    $ composer require pear/html_common2

Note that `composer.json` does not define `include-path` option: `require_once 'HTML/Common2.php'` will not
work with composer installation, use autoloading.

## Testing, Packaging and Installing (Pear)

To test, run either

    $ phpunit tests/

or

    $ pear run-tests -r

To build, simply

    $ pear package

To install from scratch

    $ pear install package.xml

To upgrade

    $ pear upgrade -f package.xml
