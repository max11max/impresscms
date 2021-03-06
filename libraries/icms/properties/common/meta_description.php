<?php
/**
 * Code required for common var of meta_description type
 *
 * @copyright           The ImpressCMS Project http://www.impresscms.org/
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since		2.0
 * @author		i.know@mekdrop.name
 * @package		ICMS\Properties\Common
 */

$value = $default != 'notdefined'?$default:'';
$this->initVar($varname, icms_properties_Handler::DTYPE_STRING, $value, false, null, '', false, _CO_ICMS_META_DESCRIPTION, _CO_ICMS_META_DESCRIPTION_DSC, false, true, $displayOnForm);
$this->setControl('meta_description', array(
		'name' => 'textarea',
		'form_editor'=>'textarea'
));