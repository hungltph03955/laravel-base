<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class Append extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'core:append {module}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create repository contract for model';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		$module = $this->argument('module');
		$list_column = Schema::getColumnListing($module);
	}

	private function insert_into_file($file_path, $insert_marker, $text, $after = true)
	{
	}
}
