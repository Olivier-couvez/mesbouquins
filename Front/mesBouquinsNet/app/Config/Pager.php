<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Pager extends BaseConfig
{
	/**
	 * --------------------------------------------------------------------------
	 * Templates
	 * --------------------------------------------------------------------------
	 * @var array<string, string>
	 */
	public $templates = [
		// 'default_full'   => 'CodeIgniter\Pager\Views\default_full',
		'default_full'   => 'App\Views\Pagers\conteneur_full',
		'default_simple' => 'CodeIgniter\Pager\Views\default_simple',
		'default_head'   => 'CodeIgniter\Pager\Views\default_head',
	];

	/**
	 * --------------------------------------------------------------------------
	 * Items Per Page
	 * --------------------------------------------------------------------------
	 * @var integer
	 */
	public $perPage = 20;
}
