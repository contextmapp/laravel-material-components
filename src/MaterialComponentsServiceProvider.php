<?php

/*
 * This file is part of the Laravel Material Components package.
 *
 * (c) Contextmapp B.V. <support@contextmapp.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Contextmapp\MaterialComponents;

use Illuminate\Contracts\View\Factory;
use Illuminate\Support\ServiceProvider;

class MaterialComponentsServiceProvider extends ServiceProvider
{
    private $composers = [
        ViewComposers\MdcButton::class => 'mdc::button',
        ViewComposers\MdcCheckbox::class => 'mdc::checkbox',
        ViewComposers\MdcDialog::class => 'mdc::dialog',
        ViewComposers\MdcFab::class, 'mdc::fab',
        ViewComposers\MdcFormField::class => 'mdc::form-field',
        ViewComposers\MdcInput::class => 'mdc::select',
        ViewComposers\MdcList::class => 'mdc::list',
        ViewComposers\MdcListItem::class => 'mdc::list.item',
        ViewComposers\MdcRadio::class => 'mdc::radio',
        ViewComposers\MdcTextField::class => 'mdc::text-field',
        ViewComposers\MdcTextFieldHelperText::class => 'mdc::text-field.helper-text',
        ViewComposers\MdcToolbarSection::class => 'mdc::toolbar.section',
        ViewComposers\MdcTopAppBarSection::class => 'mdc::top-app-bar.section',
    ];

    public function boot(Factory $viewFactory)
    {
        $this->loadViewsFrom(__DIR__ . '/../views', 'mdc');

        $this->publishes([
            __DIR__ . '/../views' => resource_path('views/vendor/mdc'),
        ], 'views');

        foreach ($this->composers as $composer => $views) {
            $viewFactory->composer($views, $composer);
        }
    }

    public function register()
    {
    }
}
