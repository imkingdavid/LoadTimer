# LoadTimer Class
A simple PHP load time measuring class. This class intends to follow the [PHP FIG Standards](http://www.php-fig.org/),
so if you notice anything that is wrong, let me know and/or submit a
Pull Request to fix it (see below).

Copyright (c) 2012 - David King (imkingdavid@gmail.com)

## Requirements
PHP 5.4

## License
This may be used as needed for any purpose, free or commercial with no
restriction. This product is provided as is with no warranty.

## Contributing

If you have something to add or you see something broken, please feel free to
create a ticket and/or a Pull Request. I do not have any specific guidelines
for commit messages, other than that they are brief and explain exactly what
is changed.

## Usage
Pop the following code at the start of your page.
```php
use imkingdavid\LoadTimer;

include('LoadTimer.php');
$timer = new LoadTimer();
```
> Tip: The class does not automatically begin timing unless the constructor's
> first argument is set to true like so:
> ```php
$timer = new LoadTimer(true);
```

If you choose not to make the timer auto-start, you will need to start it
yourself. Go to the point in your file at which you wish to begin timing, and
add the following line:
```php
$timer->start();
```
> Tip: `$timer->start()` overwrites the time at which the timer started. You
> can use this to your advantage, if you wish to have it begin at a different
> point in a script if a certain condition is met.

Finally, when you want the timer to end, place the final line of code.
```php
$timer->end();
```

Note that by default, the end() method *returns* the load time.
You can have it echo a string *as well* by setting the first argument of end()
to true. You can modify the default string that is printed by setting the
second argument of end() to a string that contains %f (sprintf() is run when
the string is printed).
```php
$load_time = $timer->end(true, 'Page loaded in %f seconds.');
```
