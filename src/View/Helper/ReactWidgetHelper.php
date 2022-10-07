<?php
declare(strict_types=1);

namespace App\View\Helper;

use BootstrapUI\View\Helper\HtmlHelper;
use Cake\Core\Configure;
use Cake\Utility\Inflector;
use Cake\View\Helper;

/**
 * ReactWidgets helper
 * @property HtmlHelper $Html
 * @property Helper\UrlHelper $Url
 */
class ReactWidgetHelper extends Helper
{
    protected $helpers = ['Html', 'Url'];

    public function widget(string $name, array $params = []): string
    {
        return Configure::read('debug')
            ? $this->widgetAsIframe($name, $params)
            : $this->widgetAsCode($name, $params);
    }

    public function widgetAsIframe(string $name, array $params = []): string
    {
        $src = 'http://localhost:3000/' . $name . '?' . http_build_query($params);
        return $this->Html->tag('iframe', '', [
            'src' => $src,
            'scrolling' => "no",
            'frameborder' => "0",
        ]);
    }

    public function widgetAsCode(string $name, array $params = []): string
    {
        $this->Html->script([
            '/reactWidgets/' . $name . '.js',
        ], ['block' => true]);

        $options = [];

        foreach ($params as $k => $v) {
            $options['data-' . Inflector::dasherize($k)] = $v;
        }

        return $this->Html->div('reactWidget-' . $name, '', $options);
    }

}
