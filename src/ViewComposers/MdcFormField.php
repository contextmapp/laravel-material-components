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

use Illuminate\Contracts\View\Composer;
use Illuminate\Contracts\View\View;

class MdcFormField implements Composer
{
    use Concerns\HasFlagClasses;

    const CLASS_ROOT = 'mdc-form-field';
    const CLASS_ALIGN_END = 'mdc-form-field--align-end';

    public static function views(): array
    {
        return ['mdc::form-field'];
    }

    public function compose(View $view)
    {
        $this->setClassName($view, self::CLASS_ROOT, [
            'align_end' => self::CLASS_ALIGN_END,
        ]);
    }
}
