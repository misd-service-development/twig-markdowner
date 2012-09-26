TwigMarkdowner
==============

Converts text with [Markdown](http://daringfireball.net/projects/markdown/) syntax into HTML in [Twig]() templates.

Authors
-------
* Stuart Chapman <stuart.chapman@admin.cam.ac.uk>

Installation
------------
1. Add TwigMarkdowner to your dependencies

        // composer.json

        {
            // ...
            "require": {
                // ...
                "misd/twig-markdowner": "1.0.*"
            }
        }

2. Use Composer to download and install TwigMarkdowner

        $ php composer.phar update misd/twig-markdowner

3. Instantiate a `MarkdownParser` and add the extension to the Twig environment

        $parser = new \dflydev\markdown\MarkdownParser();

        /** @var $twig Twig_Environment */
        $twig->addExtension(new Misd\TwigMarkdowner\Twig\Extension\MarkdownerExtension($parser));

Usage
-----
In a Twig template:

        {{ "My *Markdown* text"|markdown }}
or

        {{ object.property|markdown }}