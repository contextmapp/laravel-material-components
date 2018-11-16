<?php

/*
 * This file is part of the Laravel Material Components package.
 *
 * (c) Contextmapp B.V. <support@contextmapp.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Illuminate\Contracts\View;

interface Composer
{
    public static function views(): array;
    public function compose(View $view);
}
