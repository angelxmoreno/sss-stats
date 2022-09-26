<?php
declare(strict_types=1);

namespace App\View\Helper;

use BootstrapUI\View\Helper\HtmlHelper;
use Cake\View\Helper;

/**
 * NavBar helper
 *
 * @property HtmlHelper $Html
 */
class NavBarHelper extends Helper
{
    protected $helpers = ['Html'];

    /**
     * @param string $title
     * @param string|array $url
     * @return string
     */
    public function linkItem(string $title, $url): string
    {
        return $this->item($title, $url, 'nav-link', 'nav-item');
    }

    /**
     * @param string $title
     * @param string|array $url
     * @param string $linkClass
     * @param string $itemClass
     * @return string
     */
    protected function item(string $title, $url, string $linkClass = '', string $itemClass = ''): string
    {
        $request = $this->getView()->getRequest();
        $active = $request->getPath() === $url;
        if (is_array($url)) {
            $active = true;
            foreach (['prefix', 'plugin', 'controller', 'action'] as $param) {
                if (isset($url[$param]) && $url[$param] !== $request->getParam($param)) {
                    $active = false;
                }
            }
            $url = array_merge([
                'prefix' => false,
                'plugin' => false,
                'action' => 'index',
            ], $url);
        }

        $link = $this->Html->link($title, $url, [
            'class' => $active ? $linkClass . ' active' : $linkClass,
        ]);

        return $this->Html->tag('li', $link, [
            'class' => $itemClass,
        ]);
    }

    /**
     * @param string $title
     * @param string|array $url
     * @return string
     */
    public function dropDownItem(string $title, $url): string
    {
        return $this->item($title, $url, 'dropdown-item');
    }
}
