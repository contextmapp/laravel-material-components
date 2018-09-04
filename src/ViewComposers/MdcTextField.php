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

class MdcTextField extends MdcInput
{
    private static $floating_types = [
        'date',
        'time',
        'datetime-local',
        'file',
    ];

    public function compose(View $view)
    {
        parent::compose($view);

        $view->with('type', isset($view->type) ? $view->type : 'text');
        $view->with('float', isset($view->value) || in_array($view->type, static::$floating_types));

        $view->with('variant', isset($view->variant) ? $view->variant : null);
        $view->with('className', isset($view->variant) ? "mdc-text-field--{$view->variant}" : null);

        if ($view->variant === 'textarea') {
            $view->with('className', "{$view->className} mdc-text-field--textarea");
        }

        $view->with('icon', isset($view->icon) ? $view->icon : null);
        if (isset($view->icon)) {
            $view->with('iconPlacement', isset($view->iconPlacement) ? $view->iconPlacement : 'leading');
            $view->with('className', "{$view->className} mdc-text-field--with-{$view->iconPlacement}-icon");
        }
    }
}
