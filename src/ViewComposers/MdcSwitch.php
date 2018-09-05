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
    use Concerns\HasFlagClasses;

    const CLASS_ROOT = 'mdc-switch';
    const CLASS_DISABLED = 'mdc-switch--disabled';
    const CLASS_CHECKED = 'mdc-switch--checked';

    public function compose(View $view)
    {
        parent::compose($view);

        $this->setClassName($view, self::CLASS_ROOT, [
            'disabled' => self::CLASS_DISABLED,
            'checked' => self::CLASS_CHECKED
        ]);
    }
}
