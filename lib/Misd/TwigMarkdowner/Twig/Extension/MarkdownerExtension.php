<?php

/**
 * This file is part of the Twig extension TwigMarkdowner.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Misd\TwigMarkdowner\Twig\Extension;

use Misd\TwigMarkdowner\Twig\TokenParser\MarkdownerTokenParser;
use dflydev\markdown\MarkdownParser;

/**
 * @author Stuart Chapman <stuart.chapman@admin.cam.ac.uk>
 */
class MarkdownerExtension extends \Twig_Extension
{
    /**
     * @var MarkdownParser
     */
    private $helper;

    public function __construct(MarkdownParser $helper)
    {
        $this->helper = $helper;
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return array(
            'markdown' => new \Twig_Filter_Method($this, 'markdownFilter', array(
                'is_safe' => array('html'),
            )),
        );
    }

    /**
     * Parse string and transform any Markdown formatting to HTML.
     *
     * @param $string string Text to process
     * @return string Processed text
     */
    public function markdownFilter($string)
    {
        return $this->helper->transform($string);
    }

    /**
     * {@inheritdoc}
     */
    function getName()
    {
        return 'markdowner';
    }
}