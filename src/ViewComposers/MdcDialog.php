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

use Illuminate\Contracts\View\Composer;
use Illuminate\Contracts\View\View;

class MdcDialog implements Composer
{
    public static function views(): array
    {
        return ['mdc::dialog'];
    }

    public function compose(View $view)
    {
        if (false === isset($view->id)) {
            throw new \InvalidArgumentException('The "id" parameter is required for dialogs.');
        }

        $view->with('action', isset($view->action) ? $view->action : '#');
        $view->with('scroll', isset($view->scroll) ? $view->scroll : false);
    }
}
