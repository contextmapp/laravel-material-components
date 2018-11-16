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
use Illuminate\Support\HtmlString;

class MdcListItem implements Composer
{
    use Concerns\HasFlagClasses;

    const CLASS_ROOT = 'mdc-list-item';
    const CLASS_SELECTED = 'mdc-list-item--selected';
    const CLASS_ACTIVATED = 'mdc-list-item--activated';

    const ITEM_GRAPHIC = '<span class="mdc-list-item__graphic %s">%s</span>';
    const ITEM_AVATAR = '<img src="%s" class="mdc-list-item__graphic">';
    const ITEM_TEXT = '<span class="mdc-list-item__text">%s</span>';

    const TEXT_PRIMARY = '<span class="mdc-list-item__primary-text">%s</span>';
    const TEXT_SECONDARY = '<span class="mdc-list-item__secondary-text">%s</span>';

    public static function views(): array
    {
        return ['mdc::list.item'];
    }

    public function compose(View $view)
    {
        if (isset($view->url)) {
            $view->with('element', 'a');
        } else {
            $view->with('element', isset($view->element) ? $view->element : 'div');
        }

        if (isset($view->icon)) {
            $icon_class = isset($view->icon_class) ? $view->icon_class : 'material-icons';
            $graphic = sprintf(static::ITEM_GRAPHIC, $icon_class, $view->icon);
            $view->with('graphic', new HtmlString($graphic));
        }

        if (isset($view->avatar)) {
            $graphic = sprintf(static::ITEM_AVATAR, $view->avatar);
            $view->with('graphic', new HtmlString($graphic));
        }

        if (isset($view->primary)) {
            $text = sprintf(static::TEXT_PRIMARY, $view->primary);
            if (isset($view->secondary)) {
                $text .= sprintf(static::TEXT_SECONDARY, $view->secondary);
            }
            $slot = sprintf(static::ITEM_TEXT, $text);
            $view->with('slot', new HtmlString($slot));
        }

        $this->setClassName($view, self::CLASS_ROOT, [
            'selected' => self::CLASS_SELECTED,
            'activated' => self::CLASS_ACTIVATED,
        ]);
    }
}
