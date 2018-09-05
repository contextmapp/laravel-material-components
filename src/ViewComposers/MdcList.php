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
    use Concerns\HasFlagClasses;

    const CLASS_ROOT = 'mdc-list';
    const CLASS_AVATAR_LIST = 'mdc-list--avatar-list';
    const CLASS_TWO_LINE_LIST = 'mdc-list--two-line';
    const CLASS_DENSE_LIST = 'mdc-list--dense';
    const CLASS_NON_INTERACTIVE_LIST = 'mdc-list--non-interactive';

    public function compose(View $view)
    {
        $this->setClassName($view, self::CLASS_ROOT, [
            'avatars' => self::CLASS_AVATAR_LIST,
            'two_line' => self::CLASS_TWO_LINE_LIST,
            'dense' => self::CLASS_DENSE_LIST,
            'non_interactive' => self::CLASS_NON_INTERACTIVE_LIST,
        ]);
    }
}
