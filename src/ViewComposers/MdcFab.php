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

class MdcFab implements Composer
{
    use Concerns\HasFlagClasses;

    const CLASS_ROOT = 'mdc-fab';
    const CLASS_EXTENDED = 'mdc-fab--extended';
    const CLASS_MINI = 'mdc-fab--mini';

    public static function views(): array
    {
        return ['mdc::fab'];
    }

    public function compose(View $view)
    {
        $this->setClassName($view, self::CLASS_ROOT, [
            'extended' => self::CLASS_EXTENDED,
            'mini' => self::CLASS_MINI,
        ]);

        $view->with('extended', isset($view->extended) ? $view->extended : false);
        $view->with('label', isset($view->slot) ? $view->slot : null);
    }
}
