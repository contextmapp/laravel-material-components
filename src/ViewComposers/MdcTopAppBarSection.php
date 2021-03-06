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

class MdcTopAppBarSection
{
    const CLASS_ROOT = 'mdc-top-app-bar__section';
    const CLASS_ALIGN_START = 'mdc-top-app-bar__section--align-start';
    const CLASS_ALIGN_END = 'mdc-top-app-bar__section--align-end';

    public function compose(View $view)
    {
        $classes = [static::CLASS_ROOT];

        if (isset($view->align)) {
            if ($view->align === 'start') {
                $classes[] = static::CLASS_ALIGN_START;
            } elseif ($view->align === 'end') {
                $classes[] = static::CLASS_ALIGN_END;
            } else {
                throw new \UnexpectedValueException("Parameter 'align' accepts either 'start' or 'end', '" . $view->align . "' given.");
            }
        }

        $view->with('className', implode(' ', $classes));
    }
}
