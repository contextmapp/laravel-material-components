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

class MdcFab
{
    const CLASS_ROOT = 'mdc-fab';
    const CLASS_EXTENDED = 'mdc-fab--extended';
    const CLASS_MINI = 'mdc-fab--mini';

    private $flags = [
        'extended' => self::CLASS_EXTENDED,
        'mini' => self::CLASS_MINI,
    ];

    public function compose(View $view)
    {
        $classes = [self::CLASS_ROOT];

        foreach ($this->flags as $property => $class) {
            if (isset($view[$property]) && $view[$property]) {
                $classes[] = $class;
            }
        }

        $view->with('className', implode(' ', $classes));

        $view->with('extended', isset($view->extended) ? $view->extended : false);
        $view->with('label', isset($view->slot) ? $view->slot : null);
    }
}
