<?php
declare(strict_types=1);

namespace App\View\Helper;

use BootstrapUI\View\Helper\HtmlHelper;
use Cake\View\Helper;

/**
 * ReactWidget helper
 * @property HtmlHelper $Html
 * @property Helper\UrlHelper $Url
 */
class ReactWidgetHelper extends Helper
{
    protected $helpers = ['Html', 'Url'];

    public function example(): string
    {
        return $this->renderWithIFrame();
    }

    protected function renderWithIFrame(): string
    {
        return $this->Html->tag('iframe', '', [
            'src' => "http://localhost:3000",
            'style' => "border: none;",
            'width' => "100%",
        ]);
    }

}
