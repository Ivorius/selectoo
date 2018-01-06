<?php


namespace Dakujem\Selectoo;


/**
 * Select2Engine in Compatibility mode
 * that enables to use Select2 in version v4 with an older version (v3.5 for example).
 *
 * For this to work, you need to load the scripts in a special way:
 *
 * Source:
 * @link https://stackoverflow.com/questions/33962395/select2-multiple-versions-on-same-page-site
 *
 *
 * @author Andrej Rypák (dakujem) <xrypak@gmail.com>
 */
class Select2CompatibilityEngine extends Select2Engine
{
	protected $varName = 'select2v4';


	public function getVarName()
	{
		return $this->varName;
	}


	public function setVarName($varName)
	{
		$this->varName = $varName;
		return $this;
	}


	public function getUiScript($control)
	{
		$opts = $this->getOptionsAsString();
		$js = '
			(function($){
				$(document).ready(function(){
					' . $this->getVarName() . '.call(' . $this->selector($control) . ($opts ? ', ' . $opts : '') . ');
				});
			})(jQuery);
		';
		return $js;
	}

}
