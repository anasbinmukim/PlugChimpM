<?php
/**
 * Created By:      Tim Hudson - 3/1/2017
 * Last Modified:   t.hudson 3/1/17
 * @package	CedarWaters
 * @author	CedarWaters
 * @link	http://cedarwaters.com
 * @since	Version 1.0.0
 * @filesource
 */

defined('BASEPATH') OR exit('No direct script access allowed');

define('TAB1', "\t");
define('TAB2', "\t\t");
define('TAB3', "\t\t\t");
define('TAB4', "\t\t\t\t");
define('TAB5', "\t\t\t\t\t");
define('TAB6', "\t\t\t\t\t\t");
define('TAB7', "\t\t\t\t\t\t\t");
define('TAB8', "\t\t\t\t\t\t\t\t");
define('TAB9', "\t\t\t\t\t\t\t\t\t");

define('NULL_DATE_TIME', '0000-00-00 00:00:00');
define('NULL_DATE', '0000-00-00');
define('NULL_TIME', '00:00:00');

define('INPUT_CHECKED', 'checked="checked"');
define('INPUT_DISABLED', 'disabled="disabled"');
define('DISPLAY_NONE', 'style="display:none;"');
define('READ_ONLY', 'readonly="readonly"');

define('TBL_CORE', 'core');
define('TBL_EMAILS', 'emails');
define('TBL_GROUPS', 'groups');
define('TBL_USERS', 'users');
define('TBL_META_DATA', 'meta_data');

if (!function_exists('get_item_date')) {
    /**
     * Task Item Completed Date
     *
     * Get formatted date string for completed item, supports temporary placeholder for designing layout.
     * The field name is passed in as a string so can check if it exists before trying to access it's value,
     * this is mostly need for designing layout before fields have been added to table.
     *
     * @param	null $row Row of data from one of the task tables
     * @param   string $field Name of the field that function will try to access in table row
     * @param   bool $placeholder True indicates that placeholder string should be returned if column not available
     * @return	string Formatted date string
     */
    function get_item_date($row=NULL, $field, $placeholder=false)
    {
        $return = '';
        if ($placeholder) $return = '[%'.$field.'%]';

        if (isset($row->$field))
        {
            $item_date = $row->$field;
            if ($item_date != NULL_DATE) $return = date('m/d/Y h:i A',strtotime($item_date));
        }

        return $return;
    }
}

if (!function_exists('get_checked_attribute')) {
    /**
     * Get HTML Checked Attribute
     *
     * If the field has indicated value checked then return html checked attribute
     *
     * @param null $row
     * @param $field
     * @param null $checked_value
     * @return string
     */
    function get_checked_attribute($row=NULL, $field, $checked_value=NULL) {
        $return = '';
        if (isset($row->$field)) {
            $field_value = $row->$field;
            if (isset($checked_value)) {
                if ($field_value == $checked_value)
                    $return = INPUT_CHECKED;
            } else {
                if ($field_value)
                    $return = INPUT_CHECKED;
            }
        }
        return $return;
    }
}

if (!function_exists('get_display'))
{
    /**
     * Determine Display None Style
     *
     * Determine if element should have style attribute set with display:none
     *
     * @param null $row
     * @param $field
     * @param $value
     * @param bool $equals
     * @return string
     */
    function get_display($row=NULL, $field, $value, $equals=true)
    {
        $return = ''; // default return value (don't hide)
        $hide = ' '.DISPLAY_NONE; // hide string to add to element tag
        if (isset($row->$field))
        {
            $field_value = $row->$field;
            if ($equals)
            {
                if ($field_value == $value) $return = $hide;
            }
            else
            {
                if ($field_value != $value) $return = $hide;
            }
        }
        return $return;
    }
}

if (!function_exists('get_radio'))
{
    /**
     * @param $name
     * @param string $id
     * @param $label
     * @param null $row
     * @param int $value
     * @param bool $read
     * @param string $override_id
     * @param array $attributes
     * @return string
     */
    function get_radio($name, $id='', $label, $row=NULL, $value=0, $read=false, $override_id='', $attributes = array())
    {
        $checked = get_checked_attribute($row, $name, $value);
        if (empty($id)) {
            $id = $name;
        } else {
            $id = (empty($override_id))?$name.$id:$override_id;
        }
        $defaults = array(
            'type' => 'radio',
            'name' => $name,
            'id' => $id,
            'value' => $value
        );
        if (!empty($checked)) $defaults['checked'] = 'checked';
        if ($read) $defaults['disabled'] = 'disabled';
        return '<input '._parse_form_attributes($attributes, $defaults).'/> '.html_escape($label).PHP_EOL;
    }
}

if (!function_exists('get_checkbox'))
{
    /**
     * @param $name
     * @param $label
     * @param $row
     * @param bool $read
     * @param string $class
     * @param string $id
     * @param array $attributes
     * @return string
     */
    function get_checkbox($name, $label, $row=NULL, $read=false, $class='', $id='', $attributes = array())
    {
        $checked = get_checked_attribute($row, $name);
        $defaults = array(
            'type' => 'checkbox',
            'name' => $name,
            'id' => (empty($id)) ? $name : $id
        );
        if (!empty($class)) $defaults['class'] = $class;
        if (!empty($checked)) $defaults['checked'] = 'checked';
        if ($read) $defaults['disabled'] = 'disabled';
        return '<input '._parse_form_attributes($attributes, $defaults).'/> '.html_escape($label).PHP_EOL;
    }
}

if (!function_exists('get_input'))
{
    /**
     * @param $name
     * @param string $placeholder
     * @param string $value
     * @param bool $read
     * @param string $id
     * @param string $class_append
     * @param string $class_replace
     * @param array $attributes
     * @return string
     */
    function get_input($name, $placeholder='', $value='', $read=false, $id='', $class_append='', $class_replace='', $attributes = array())
    {
        $defaults = array(
            'type' => 'text',
            'class' => get_classes('form-control', $class_append, $class_replace),
            'name' => $name,
            'id' => (empty($id)) ? $name : $id
        );
        if ($read) $defaults['readonly'] = 'readonly';
        if (!empty($value)) $defaults['value'] = $value;
        if (!empty($placeholder)) $defaults['placeholder'] = $placeholder;
        return '<input '._parse_form_attributes($attributes, $defaults).'/>'.PHP_EOL;
    }
}
if (!function_exists('get_number'))
{
    /**
     * @param $name
     * @param string $placeholder
     * @param string $value
     * @param bool $read
     * @param string $id
     * @param string $class_append
     * @param string $class_replace
     * @param array $attributes
     * @return string
     */
    function get_number($name, $placeholder='', $value='', $read=false, $id='', $class_append='', $class_replace='', $attributes = array())
    {
        $defaults = array(
            'type' => 'number',
            'class' => get_classes('form-control', $class_append, $class_replace),
            'name' => $name,
            'id' => (empty($id)) ? $name : $id
        );
        if ($read) $defaults['readonly'] = 'readonly';
        if (!empty($value)) $defaults['value'] = $value;
        if (!empty($placeholder)) $defaults['placeholder'] = $placeholder;
        return '<input '._parse_form_attributes($attributes, $defaults).'/>'.PHP_EOL;
    }
}

if (!function_exists('get_button'))
{
    /**
     * @param $label
     * @param string $id
     * @param array $attributes
     * @param int $type
     * @param bool $read
     * @param string $color
     * @param string $class_replace
     * @param string $class_append
     * @return string
     */
    function get_button($label, $id = '', $attributes = array(), $type = 1, $read = false, $color = '', $class_replace='', $class_append='')
    {
        $color = (empty($color)) ? 'blue-steel' : $color;
        $tag = 'input'; // default for input tag
        $tag_end = '/>'; // default for input tag
        $button_text = (empty($label)) ? '' : '<i class="'.html_escape($label).'"></i>';  // text to display with button tag
        $defaults = array(
            'type' => 'button',
            'class' => get_classes('btn btn-sm btn-block '.$color, $class_append, $class_replace)
        );
        if (!empty($id)) $defaults['id'] = $id;

        // right now function only supports 1 & 2, if more types are added additional conditions will be needed
        if ($type===1) {
            if (!empty($label)) $defaults['value'] = html_escape($label);
        } else if ($type===2) { // use button tag, so replace input defaults
            $tag = 'button';
            $tag_end = '>';
        }

        if ($read) $defaults['disabled'] = 'disabled';
        $return = '<'.$tag.' '._parse_form_attributes($attributes, $defaults).$tag_end;
        $return .= ($type===2) ? $button_text.'</button>' : '';
        return $return.PHP_EOL;
    }
}

if (!function_exists('get_span_required'))
{
    /**
     * @param $id
     * @param string $class_append
     * @param string $class_replace
     * @param array $attributes
     * @return string
     */
    function get_span_required($id, $class_append = '', $class_replace = '', $attributes = array())
    {
        $defaults = array(
            'class' => get_classes('text-danger', $class_append, $class_replace),
            'id' => $id
        );
        return '<span '._parse_form_attributes($attributes, $defaults).'></span>'.PHP_EOL;
    }
}

if (!function_exists('get_select'))
{
    /**
     * @param $name, Select name attribute
     * @param $array, String array of select options
     * @param $row, Database row object
     * @param $item_id, Name of item on select option record that contains value to store
     * @param $item_name, Name of item on select option record that contains value to display, supports list of fields that will be concatenated with a space
     * @param string $first_option, Optional value and name of first option, if value not present uses "", if using value pass in string like "value,name"
     * @param string $id, Optional element id string to override default name attribute
     * @param string $class_append, Optional class (or classes) to append to the default class
     * @param string $class_replace, Optional class (or classes) to replace default class
     * @param array $attributes
     * @return string
     */
    function get_select($name, $array, $row, $item_id, $item_name, $first_option = '', $id = '', $class_append = '', $class_replace = '', $attributes = array())
    {
        if (empty($first_option)) {
            $first_option = '<option value="">Select</option>';
        } else {
            if (strpos($first_option, ',') === false) {
                $first_option = '<option value="">'.$first_option.'</option>';
            } else {
                $option_array = explode(',', $first_option);
                $first_option = '<option value="'.$option_array[0].'">'.$option_array[1].'</option>';
            }
        }
        $id = (empty($id)) ? $name : $id;
        $item_names = explode(',', $item_name);
        $defaults = array(
            'class' => get_classes('form-control', $class_append, $class_replace),
            'id' => $id,
            'name' => $name
        );
        $return = '<select '._parse_form_attributes($attributes, $defaults).'>'.PHP_EOL;
        $return .= TAB4.$first_option.PHP_EOL;
        foreach ($array as $item) {
            $selected = ($row->$id == $item->$item_id)?' selected':'';
            $option_name = '';
            foreach ($item_names as $field) {
				if( $item->$field ) {
                	$option_name .= (empty($option_name))?$item->$field:' - '.$item->$field;
				}
            }
            $return .= TAB4.'<option value="'.$item->$item_id.'"'.$selected.'>'.$option_name.'</option>'.PHP_EOL;
        }
        $return .= TAB3.'</select>';
        return $return.PHP_EOL;
    }
}

if ( ! function_exists('get_textarea'))
{
    /**
     * Textarea field
     *
     * @param	string	$name
     * @param   string  $placeholder
     * @param	string	$value
     * @param	mixed	$extra
     * @param   string  $class_append
     * @param   string  $class_replace
     * @return	string
     */
    function get_textarea($name = '', $placeholder = '', $value = '', $extra = '', $class_append = '', $class_replace = '')
    {
        $defaults = array(
            'class' => get_classes('form-control', $class_append, $class_replace),
            'name' => $name,
            'id' => $name
        );
        if (!empty($placeholder)) $defaults['placeholder'] = $placeholder;
        return '<textarea '._parse_form_attributes(null, $defaults)._attributes_to_string($extra).'>'.html_escape($value).'</textarea>'.PHP_EOL;
    }
}

if (!function_exists('get_label'))
{
    /**
     * @param string $label
     * @param string $for
     * @param bool $new_line
     * @param string $class_replace
     * @param string $class_append
     * @param array $attributes
     * @return string
     */
    function get_label($label = '', $for = '', $new_line = false, $class_replace = '', $class_append = '', $attributes = array())
    {
        $eol = ($new_line) ? PHP_EOL : '';
        $defaults = array(
            'class' => get_classes('control-label', $class_append, $class_replace)
        );
        $id = $for;
        if (strpos($for, ',') !== false) {
            $field_ref = explode(',', $for);
            $id = $field_ref[0]; // replace variable with just field name (string before comma)
            //$table = $field_ref[1]; // field's table...use as part of query to get label from meta data
            //TODO add code to get row from meta_table using field name and table name
            //TODO if row is found then replace $label variable with value from row->title
        }
        if (!empty($id)) $defaults['for'] = $id;
        return '<label '._parse_form_attributes($attributes, $defaults).'>'.$label.'</label>'.$eol;
    }
}

if (!function_exists('get_value'))
{
    /**
     * @param $row
     * @param $field
     * @param bool $placeholder
     * @return string
     */
    function get_value($row = null, $field = '', $placeholder = false)
    {
        $return = ($placeholder) ? '[%'.$field.'%]' : '';
        if (isset($row) AND !empty($field)) {
            if (isset($row->$field)) $return = $row->$field;
        }
        return $return;
    }
}

if (!function_exists('get_classes'))
{
    /**
     * @param string $default
     * @param string $append
     * @param string $replace
     * @return string
     */
    function get_classes($default = '', $append = '', $replace = '')
    {
        if (empty($append) AND empty($replace)) {
            $class = $default;
        } else {
            $class = (empty($replace)) ? $default.' '.$append : $replace;
        }
        return $class;
    }
}