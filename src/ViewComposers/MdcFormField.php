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

class MdcFormField
{
    const CLASS_ROOT = 'mdc-form-field';
    const CLASS_ALIGN_END = 'mdc-form-field--align-end';

    private $flags = [
        'align_end' => self::CLASS_ALIGN_END,
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
