LoadTimer Class
===============
A simple PHP load time measuring class.

Copyright (c) 2012 - David King (imkingdavid@gmail.com)

Requirements
------------
PHP 5.3

License
-------
This may be used as needed for any purpose, free or commercial with no restriction.
This product is provided as is with no warranty.

Usage
-----
Using the class requires you to simply add three lines to your code (or two if you autoload classes).
Put the following code as close to the top of your PHP file as you can. (Or if you're just wanting to
measure time it takes to do a certain operation, place this just before that operation runs).

	include('LoadTimer.php');
	$timer = new LoadTimer;

And then, following your final line of PHP code (or the last line in the operation you are measuring),
simply call the end() method.

	$timer->end();

Note that by default, the end() method echos the result like so:
> Page load took $load_time seconds.

You can make it return the result (only the seconds) by making the first argument false.
You can change the language text that is outputted by changing the second argument. It should be a
string formatted for sprintf().

	$load_time = $timer->end(false);
