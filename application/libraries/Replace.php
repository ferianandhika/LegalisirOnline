<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Replace
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

function index($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
	

}

/* End of file Replace.php */
/* Location: ./application/libraries/Replace.php */
