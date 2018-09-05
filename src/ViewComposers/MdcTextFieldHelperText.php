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

class MdcTextFieldHelperText
{
    const CLASS_ROOT = 'mdc-text-field-helper-text';
    const CLASS_PERSISTENT = 'mdc-text-field-helper-text--persistent';
    const CLASS_VALIDATION = 'mdc-text-field-helper-text--validation-msg';

    private $flags = [
        'persistent' => self::CLASS_PERSISTENT,
        'validation' => self::CLASS_VALIDATION,
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
    }
}
