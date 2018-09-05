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

class MdcSwitch extends MdcCheckbox
{
    const CLASS_ROOT = 'mdc-switch';
    const CLASS_DISABLED = 'mdc-switch--disabled';
    const CLASS_CHECKED = 'mdc-switch--checked';

    private $flags = [
        'disabled' => self::CLASS_DISABLED,
        'checked' => self::CLASS_CHECKED
    ];

    public function compose(View $view)
    {
        parent::compose($view);

        $classes = [self::CLASS_ROOT];

        foreach ($this->flags as $property => $class) {
            if (isset($view[$property]) && $view[$property]) {
                $classes[] = $class;
            }
        }

        $view->with('className', implode(' ', $classes));
    }
}
