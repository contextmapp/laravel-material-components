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

class MdcRadio extends MdcInput
{
    public function compose(View $view)
    {
        parent::compose($view);

        $view->with('checked', isset($view->checked) ? $view->checked : false);
    }
}
