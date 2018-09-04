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

class MdcInput
{
    public function compose(View $view)
    {
        if (!isset($view->field)) {
            throw new \RuntimeException('The "field" parameter is required for input components.');
        }

        $view->with('dotName', implode('.', $this->fieldToComponents($view->field, '*')));
        $view->with('id', implode('-', $this->fieldToComponents($view->field)));
        $view->with('label', isset($view->slot) ? $view->slot : null);

        $view->with('required', isset($view->required) ? $view->required : false);
        $view->with('readonly', isset($view->readonly) ? $view->readonly : false);
        $view->with('disabled', isset($view->disabled) ? $view->disabled : false);
        $view->with('autofocus', isset($view->autofocus) ? $view->autofocus : false);

        if (function_exists('old')) {
            $view->with('value', old($view->dotName, isset($view->value) ? $view->value : null));
        } else {
            $view->with('value', isset($view->value) ? $view->value : null);
        }
    }

    private function fieldToComponents(string $field, string $empty = null): array
    {
        static $counter;

        if (false === $start = mb_strpos($field, '[')) {
            return [$field];
        }

        $components = [
            mb_substr($field, 0, $start),
        ];

        while (true) {
            $start += 1;
            $end = mb_strpos($field, ']', $start);

            if ('' === $component = mb_substr($field, $start, $end - $start)) {
                $counter += 1;
                $component = isset($empty) ? $empty : $counter;
            }

            $components[] = $component;

            if (false === $start = mb_strpos($field, '[', $end)) {
                break;
            }
        }

        return $components;
    }
}
