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

class MdcList
{
    const CLASS_ROOT = 'mdc-list';
    const CLASS_AVATAR_LIST = 'mdc-list--avatar-list';
    const CLASS_TWO_LINE_LIST = 'mdc-list--two-line';
    const CLASS_DENSE_LIST = 'mdc-list--dense';
    const CLASS_NON_INTERACTIVE_LIST = 'mdc-list--non-interactive';

    private $flags = [
        'avatars' => self::CLASS_AVATAR_LIST,
        'two_line' => self::CLASS_TWO_LINE_LIST,
        'dense' => self::CLASS_DENSE_LIST,
        'non_interactive' => self::CLASS_NON_INTERACTIVE_LIST,
    ];

    public function compose(View $view)
    {
        $classes = [static::CLASS_ROOT];

        foreach ($this->flags as $property => $class) {
            if (isset($view[$property]) && $view[$property]) {
                $classes[] = $class;
            }
        }

        $view->with('className', implode(' ', $classes));
    }
}
