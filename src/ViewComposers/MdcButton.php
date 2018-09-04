<?php

/*
 * This file is part of the Laravel Material Components package.
 *
 * (c) Contextmapp B.V. <support@contextmapp.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Contextmapp\MaterialComponents\ViewComposers;

use Illuminate\Contracts\View\View;

class MdcButton
{
    public function compose(View $view)
    {
        if (!isset($view->slot)) {
            throw new \RuntimeException('The should contain a value.');
        }

        $view->with('label', $view->slot);
        $view->with('type', isset($view->type) ? $view->type : 'button');
        $view->with('className', isset($view->variant) ? "mdc-button--{$view->variant}" : null);

        if ($view->type === 'link' && !isset($view->url)) {
            throw new \RuntimeException('The "url" parameter is required for link buttons.');
        }
    }
}
