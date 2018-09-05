<?php

/*
 * This file is part of the Laravel Material Components package.
 *
 * (c) Contextmapp B.V. <support@contextmapp.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Contextmapp\MaterialComponents\ViewComposers\Concerns;

use Illuminate\Contracts\View\View;

trait HasFlagClasses
{
    protected function setClassName(View $view, string $rootClass, array $flags = [])
    {
        $classes = [$rootClass];

        foreach ($flags as $property => $class) {
            if (isset($view[$property]) && $view[$property]) {
                $classes[] = $class;
            }
        }

        $view->with('className', implode(' ', $classes));
    }
}
