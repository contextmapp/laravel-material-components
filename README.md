# Material Components for Laravel

This package provides Blade components to use 
[Material Components](https://material.io/develop/web/) with Laravel.

## Installation

Add the package with Composer:

```sh
composer require contextmapp/laravel-material-components
```

If you use Laravel 5.4 or later, the package's service provider registers
itself with your application. Otherwise, you should add the provider to your
application config in `config/app.php`:

```php
<?php

return [
    // ...
    
    'providers' => [
        // ...
    
        Contextmapp\MaterialComponents\MaterialComponentsServiceProvider::class,
    ],
];
```

## Components

The components are available under the `mdc` namespace.

Include the MDC stylesheet and script bundles.

```html
<link rel="stylesheet" href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css">
<script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
```

To make use of the Material Icons, include the icon font:

```html
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
```
 
All components have the `data-mdc-auto-init` attribute set, so they will be 
initialized automatically when `mdc.autoInit()` is called.

### Buttons
 
Component: `mdc::button`

Example:
```blade
@component('mdc::button', ['type' => 'submit'])
    @slot('icon', 'add')
    Button label
@endcomponent
```

Slots:
* Default: populates the button label

Parameters:
* `type`: The type of button (values: `button`, `submit`, `link`, default: `button`)
* `url`: The URL to point the button to (required when type is `link`)
* `icon`: The name of the icon to add to the button
* `iconClass`: The class to apply to button icon (defaults to `material-icons`)
* `method`: The `_method` field value for when the button is activated
* `form`: The <form> you want to target with the button (if the button is outside the form)
* `variant`: The Material Design spec button variant (allowed: `unelevated`, `raised`, `outlined`, `dense`, default: none)

### Cards
 
Component: *TODO*

### Chips

Component: *TODO*

### Dialogs 

Component: `mdc::dialog`

The dialog component contains a form, so you can easily add form components to
add interactivity to it. Add a submit button as one of the form actions and 
you're done. When included in a Laravel framework application, the CSRF-field
is added automatically.

Example:
```blade
@component('mdc::dialog', ['id' => 'some-dialog'])
    @slot('title', 'Do you want to continue?')
    
    Caution: there might be dragons ahead. Or maybe a grue.
    
    @slot('footer')
        @component('mdc::dialog.action', ['action' => 'cancel'])
            Cancel
        @endcomponent
        @component('mdc::dialog.action', ['action' => 'accept'])
            Continue
        @endcomponent
    @endslot
@endcomponent
```

Slots:
* Default: the dialog body
* `title`: The dialog title component
* `footer`: The dialog footer, containing the action buttons

Parameters:
* `id`: __required__ - The dialog ID to refer to when interacting with the dialog
* `action`: The endpoint for the form to submit to
* `method`: The HTTP method to use when submitting the form (you can override this with a specific action button)

#### Dialog actions

Component: `mdc::dialog.action`

Example:
```blade
@component('mdc::dialog.action', ['action' => 'cancel'])
    Cancel
@endcomponent
```

Slots:
* Default: the button label

Parameters:
* `action`: __required__ - The dialog action (allowed: `accept`, `cancel`)
* `type`: The button type (allowed: `button`, `submit`, default: `button`)

### Drawers

Component: `mdc::drawer`

Example:
```blade
@component('mdc::drawer', ['id' => 'main-nav', 'type' => 'persistent'])
    @component('mdc::list.item', ['url' => url('/users'), 'activated' => true])
        @slot('icon', 'person')
        Users
    @endcomponent
    @component('mdc::list.item', ['url' => url('/settings')])
        @slot('icon', 'settings')
        Settings
    @endcomponent
@endcomponent
```

Slots:
* Default: the drawer contents
* `header`: the drawer header (if omitted, adds a toolbar spacer to the drawer)

Parameters:
* `id`: __required__ - The drawer ID to refer to when interacting with the drawer
* `type`: __required__ - The drawer variant (allowed: `persistent`, `temporary`)
* `open`: Flag to render the drawer as opened by default

### Image List

Component: *TODO*

### Inputs and controls

For all inputs, the default slot functions as the label of the component.

Shared parameters:
* `field`: __required__ - The name to give to the input. This will automatically determine the old value if the form was previously submitted
* `value`: The value for the field
* `required`: Flag to toggle required state of input
* `disabled`: Flag to toggle disabled state of input
* `autofocus` Flag to toggle autofocus state of input

#### Checkboxes
 
Component: `mdc::checkbox`

Example:
```blade
@component('mdc::checkbox', ['field' => 'terms_of_service'])
    I agree to the <a href="{{ url('/terms') }}">Terms of Service</a>;
@endcomponent
```

Parameters:
* `valueOn`: The value to submit when the checkbox is checked (default: `1`)
* `valueOff`: The value to submit when the checkbox is unchecked (default: `0`)
* `checked`: Set the checked state of the checkbox. (default: determined automatically from the `value` field)

#### Radios

Component: *TODO*

#### Select 

Component: `mdc::select`

Example:
```blade
@component('mdc::select', ['field' => 'pizza'])
    Your favorite pizza
    @slot('options')
        <option value="hawaii">Hawaii</option>
        <option value="pepperoni">Pepperoni</option>
        <option value="margherita">Margherita</option
    @endslot
@endcomponent
```

Slots:
* `options`: The slot containing the selectable options

Parameters:

_This component has no additional parameters_

#### Sliders

Component: *TODO*

#### Switches

Component: *TODO*

#### Text Field 

Component: `mdc::text-field`

Example:
```blade
@component('mdc::text-field', ['field' => 'email', 'type' => 'email'. 'required' => true])
    @slot('value', $user->email)
    E-mail Address
@endcomponent
```

Parameters:
* `type`: The type of input (default: `text`)
* `variant`: The text field variant (allowed: `fullwidth`, `textarea`, `outlined`, default: none)
* `icon`: The icon to add to the text field
* `iconClass`: The icon class to apply to the icon (default: `material-icons`)
* `iconPlacement`: Where to place the icon (allowed: `leading`, `trailing`, default: `leading`)
* `help`: The help text for the text field

### Lists
 
Components: `mdc::list`

Example:
```blade
@component('mdc::list', ['two_line' => true])
    {{-- Insert some 'mdc::list.item' components here --}}
@endcomponent
```

Parameters:
* `non_interactive`: Flag to toggle non-interactive list variant
* `dense`: Flag to toggle dense list variant
* `avatars`: Flag to toggle avatar list variant
* `two_line`: Flag to toggle two-line list variant

#### List items

Components: `mdc::list.item`

Example of a regular list item with icon:
```blade
@component('mdc::list.item', ['icon' => 'group', 'url' => url('/groups')])
    Groups
@endcomponent
```

Example of a two line list item with avatar:
```blade
@component('mdc::list.item', ['avatar' => url('/users/john-doe.png')])
    @slot('primary', 'John Doe')
    @slot('secondary', 'john.doe@example.com')
@endcomponent
```

Slots:
* Default: The text contents of the item (when `primary` slot is set, this will override default slot contents)
* `primary`: The primary text content of the item
* `secondary`: The secondary text content of the item 
* `graphic`: The first tile for the list item (can also be set through `icon` or `avatar` properties)
* `meta`: The last tile for the list item

Parameters:
* `url`: The URL to point the list item to
* `avatar`: The URL to the avatar to use as the list item graphic
* `icon`: The icon to use as the list item graphic
* `iconClass`: The icon class for the list item graphic (default: `material-icons`)
* `selected`: Flag to toggle the list item as selected
* `activated`: Flag to toggle the list item as activated

### Menus
 
Components: `mdc::menu`

Example:
```blade
@component('mdc::menu', ['id' => 'some-menu'])
    {{-- Populate the menu with 'mdc::list.item' components --}}
@endcomponent
```

Parameters:
* `id`: __required__ - The menu ID to refer to when interacting with the menu

### Snackbars 

Component: `mdc::snackbar`

Example:
```blade
@component('mdc::snackbar')
@endcomponent
```

Parameters:

_This component has no parameters_

### Tabs

Component: *TODO*

### Toolbars

Component: `mdc::toolbar`

Example:
```blade
@component('mdc::toolbar')
    Users
    @slot('actions')
        @component('mdc::toolbar.action', ['url' => url('/archive'), 'icon' => 'archive'])
            Archived users
        @endcomponent
    @endslot
@endcomponent
```

Slots:
* Default: The toolbar title
* `actions`: The contents of the end-aligned toolbar section

Parameters:

_This component has no parameters_

#### Toolbar action

Component: `mdc::toolbar.action`

Example:
```blade
@component('mdc::toolbar.action', ['url' => url('/search'), 'icon' => 'search'])
Search
@endcomponent
```

Slots:
* Default: the label for the toolbar action

Parameters:
* `icon`: __required__ - The icon to use on the toolbar action
* `iconClass`: The icon class for the toolbar action (default: `material-icons`) 
* `url`: The URL for the toolbar action

### Top App Bar 

Component: `mdc::top-app-bar`

This component mimics the toolbar component in most aspects, refer to the 
toolbar section for more information 

Example:
```blade
@component('mdc::top-app-bar')
    {{ config('app.name') }}
    @slot('actions')
        @component('mdc::top-app-bar.action', ['url' => url('/archive'), 'icon' => 'archive'])
            Archived users
        @endcomponent
    @endslot
@endcomponent
```

Slots:
* Default: The contents of the start-aligned app bar section
* `actions`: The contents of the end-aligned app bar section

Parameters:

_This component has no parameters_
