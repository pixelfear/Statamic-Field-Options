<?php

class Plugin_field_options extends Plugin
{

	public function index()
	{
		// Get fieldset from parameter or front-matter
		// Bail and log error if no fieldset
		if ( ! $fieldset = $this->fetchParam('fieldset', array_get($this->context, '_fieldset'))) {
			$this->log->error('Fieldset not found in front-matter or in parameters.');
			return false;
		}

		// Get the field config
		$field = $this->fetchParam('field');
		$fieldset = Statamic_fieldset::fetch_fieldset($fieldset);
		$field_config = array_get($fieldset, "fields:$field");

		// Reformat the options array
		if ($options = array_get($field_config, 'options')) {
			foreach ($options as $key => $val) {
				$field_config['options'][] = array(
					'key'  => $key,
					'value' => $val
				);
				unset($field_config['options'][$key]);
			}
		}

		return Parse::tagLoop($this->content, $field_config['options'], true, $this->context);
	}

}
