<?php
/**
 * LoadTimer Class
 * A simple PHP load time measuring class.
 *
 * Version 1.0.0
 *
 * Copyright (c) 2012 - David King <imkingdavid@gmail.com>
 */

namespace imkingdavid\LoadTimer;

class LoadTimer
{
	/**
	 * The start time for the page load
	 * @var int
	 */
	protected $start = null;
	
	/**
	 * The end time for the page load
	 * @var int
	 */
	protected $end = null;

	/**
	 * The laps marked by the timer
	 * @var array
	 */
	protected $laps = [];
	
	/**
	 * The difference between the end and start time, aka the load time
	 * @var int
	 */
	protected $load_time = null;

	/**
	 * Start the page load timer
	 *
	 * @param bool $autoStart Whether to start the timer when the class is initialized
	 */
	public function __construct($autoStart = false)
	{
		if($autoStart) {
			$this->start();
		}
	}

	/**
	 * Start the timer
	 *
	 * @return null
	 */
	public function start()
	{
		$this->start = $this->currentTime();
	}

	/**
	 * Get the current time
	 *
	 * @return int Current time
	 */
	protected function currentTime()
	{
		return microtime(true);
	}

	/**
	* Add a lap
	*
	* @param string $message Label for the lap
	*/
	public function lap($message = '')
	{
		if (empty($message)) {
			$message = 'Lap ' . ($this->lapCount() + 1);
		}

		$this->laps[] = [
			$message,
			$this->currentTime(),
		];
	}

	/**
	* Get array of laps
	*
	* @return array
	*/
	public function laps()
	{
		return $this->laps;
	}

	/**
	* Return total number of laps
	*
	* @return int
	*/
	public function lapCount()
	{
		return count($this->laps());
	}

	/**
	 * Finish up the load time script
	 *
	 * @param bool $echo Whether to echo the string or not
	 * @param string $message String formatted for sprintf()
	 * @return float Returns the load time
	 */
	public function end($echo = false, $message = 'Page load took %f seconds')
	{
		if ($this->load_time === null && $this->end === null) {
			$this->end = $this->currentTime();
			$this->load_time = $this->getLoadTime();
		}

		if ($echo) {
			echo sprintf($message, $this->load_time);
		}
		
		return $this->load_time;
	}

	/**
	 * Return the load time
	 *
	 * @return float Returns the total load time
	 */
	public function getLoadTime()
	{
		return $this->load_time ?: $this->end - $this->start;
	}
}
