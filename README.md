#LoadTimer Class
A simple PHP load time measuring class.

Copyright (c) 2012 - David King (imkingdavid@gmail.com)

##Requirements
PHP 5.3

##License
This may be used as needed for any purpose, free or commercial with no restriction.
This product is provided as is with no warranty.

##Usage
Pop the following code at the start of your page.
    
    include('LoadTimer.php');
    $timer = new LoadTimer();
> Tip: The class does not automatically begin timing unless the constructor's first argument is set to true like so: `$timer = new LoadTimer(true);`

If you choose not to make the timer auto-start, you will need to start it yourself. Go to the point in your file at which you wish to begin timing, and add the following line:

    $timer->start();
> Tip: `$timer->start()` overwrites the time at which the timer started. You can use this to your advantage, if you wish to have it begin at a different point in a script if a certain condition is met.

Finally, when you want the timer to end, place the final line of code.
`	$timer->end();`

Note that by default, the end() method *returns* the load time.
You can have it echo a string as well by setting the first argument of end() to true. You can modify the default string that is echo'd by setting the second argument of end() to a string that contains %f (sprintf() is run when the string is echo'd).
    
    $load_time = $timer->end(true, 'Page loaded in %f seconds.');
