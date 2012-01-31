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
	public $start = 0;
	/**
	 * @var The end time for the page load
	 */
	public $end = 0;
	/**
	 * @var The difference between the end and start time, aka the load time
	 */
	public $load_time = 0;

	/**
	 * Start the page load timer
	 */
	function __construct()
	{
		$this->start = $this->currentTime();
	}

	/**
	 * Get the current time
	 *
	 * @return int Current time
	 */
	function currentTime()
	{
		return $this->add(explode(' ', microtime()));
	}

	/**
	 * Finish up the load time script
	 *
	 * @param bool $echo Whether to echo the string or not
	 * @param string $string String formatted for sprintf()
	 * @return int|null If $echo is false, returns the integer value of the load time
	 */
	function end($echo = true, $string = 'Page load took %f seconds')
	{
		$this->end = $this->currentTime();
		$this->load_time = $this->end - $this->start;

		if($echo) 
			echo sprintf($string, $this->load_time);
		else
			return $this->load_time;
	}

	/**
	 * Adds together integer values in an array
	 *
	 * @param array $vals Array of integer values to add together
	 * @return int Total of array values added together
	 */
	function add($vals = array())
	{
		$total = 0;
		for($i = 0; $i < count($vals); $i++)
		{
			$total += $vals[$i];
		}
		return $total;
	}
}
