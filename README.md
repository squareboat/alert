# Laravel Alert Notifications

[![Build Status](https://travis-ci.org/akaamitgupta/alert.svg?branch=master)](https://travis-ci.org/akaamitgupta/alert)

Laravel alert notifications using a beautiful javascript alert [(sweet-alert)](http://t4t5.github.io/sweetalert/).

## Install

### Install via composer

```
$ composer require squareboat/alert dev-master
```

or

Add dependency to your `composer.json` file and run composer update.

```
require: {
    "squareboat/alert": "dev-master"
}
```

### Configure Laravel

Once installation operation is complete, simply add both the service provider and facade classes to your project's `config/app.php` file:

#### Service Provider
```
Squareboat\Alert\AlertServiceProvider::class,
```

#### Facade

```
'Alert' => Squareboat\Alert\Facades\Alert::class,
```


### Download & install Sweet Alert library

#### Download the `.js` and `.css` from the [website](http://t4t5.github.io/sweetalert/)
or

#### Install through bower
```
bower install sweetalert
```
or
#### Install through NPM:
```
npm install sweetalert
```

### Finally, include default alert view to your layout

Package default provides bootstrap ready alert view. Just include `alert::message` file to your main layout in blade:

```
@include('alert::message')
```

or if you don't use blade:

```
<?= view('alert::message') ?>
```

If you need to modify the alert message partials, you can run:

```
php artisan vendor:publish
```

The package view will now be located in the `resources/views/vendor/alert` directory.

And that's it! With your coffee in reach, start flashing out alert messages!

## Usage

Within your controllers, before you perform a redirect...

```
public function create()
{
    // do something awesome...

    alert()->success('Resource created successfully!');

    return redirect()->route('dashboard');
}
```

### Level for all alerts are following:

**Success**
```
Alert::success('This is a success message.', 'Optional Title');
```
or
```
alert()->success('This is a success message.', 'Optional Title');
```

**Basic**
```
Alert::basic('This is a basic message.', 'Mandatory Title');
```
or
```
alert()->basic('This is a basic message.', 'Mandatory Title');
```

**Info**
```
Alert::info('This is an info message.', 'Optional Title');
```
or
```
alert()->info('This is an info message.', 'Optional Title');
```

**Warning**
```
Alert::warning('This is a warning message.', 'Optional Title');
```
or
```
alert()->warning('This is a warning message.', 'Optional Title');
```

**Error**
```
Alert::error('This is an error message.', 'Optional Title');
```
or
```
alert()->error('This is an error message.', 'Optional Title');
```

### Default View
```
<?php if(session()->has('sweet_alert.alert')) { ?>
    <script>
        if (typeof swal === "function") {
            swal(<?= e(session('sweet_alert.alert')) ?>);
        } else {
            sweet_alert = <?= e(session('sweet_alert.alert')) ?>;
        }
    </script>
<?php } ?>
```
The `sweet_alert.alert` session key contains a JSON configuration object to pass it directly to Sweet Alert `swal()` funtion.

Default view considers that you have initialized the sweetalert plugin by referencing the necessary files and uses its `swal()` function.

If `swal()` function is not defined then default view declares a javascript variable `sweet_alert` which you can use anywhere you like.

### Final Considerations

By default, all alerts will dismiss after a sensible default number of seconds.
But no fear, if you need to specify a different time you can:
```
alert('Some alert message!')->autoclose(2000);
```
Remember!, the number is set in `milliseconds`

Also, if you need the alert to be persistent on the page until the user dismiss it by pressing the alert confirmation button:
```
alert('Force may with you')->important("optional text");
```
The optional text will appear in the button otherwise default text `OK` is shown.

# License

The MIT License. Copyright © SquareBoat 2016
