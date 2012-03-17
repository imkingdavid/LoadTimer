<?php
/**
 * LoadTimer Class
 * A simple PHP load time measuring class.
 *
 * Version 1.0.0
 *
 * Copyright (c) 2012 - David King <imkingdavid@gmail.com>
 */
class LoadTimer
{
	/**
	 * @var The start time for the page load
	 */
	private $start;
	/**
	 * @var The end time for the page load
	 */
	private $end;
	/**
	 * @var The difference between the end and start time, aka the load time
	 */
	private $load_time;

	/**
	 * Start the page load timer
	 */
	function __construct($autoStart = false)
	{
		if($autoStart)
			$this->start();
	}

	/**
	 * Start the timer
	 *
	 * @return null
	 */
	function start()
	{
		$this->start = $this->currentTime();
	}

	/**
	 * Get the current time
	 *
	 * @return int Current time
	 */
	public function currentTime()
	{
		return microtime(true);
	}

	/**
	 * Finish up the load time script
	 *
	 * @param bool $echo Whether to echo the string or not
	 * @param string $string String formatted for sprintf()
	 * @return int|null If $echo is false, returns the integer value of the load time
	 */
	function end($echo = false, $string = 'Page load took %f seconds')
	{
		$this->end = $this->currentTime();
		$this->load_time = $this->end - $this->start;

		if($echo) 
			echo sprintf($string, $this->load_time);
		
		return $this->load_time;
	}
}
