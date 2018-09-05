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
    use Concerns\HasFlagClasses;

    const CLASS_ROOT = 'mdc-text-field-helper-text';
    const CLASS_PERSISTENT = 'mdc-text-field-helper-text--persistent';
    const CLASS_VALIDATION = 'mdc-text-field-helper-text--validation-msg';

    public function compose(View $view)
    {
        $this->setClassName($view, self::CLASS_ROOT, [
            'persistent' => self::CLASS_PERSISTENT,
            'validation' => self::CLASS_VALIDATION,
        ]);
    }
}
