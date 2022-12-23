@php
if (!$type) {
  $type = 'text';
} elseif ($type == 'switch') {
  $type = 'checkbox';
}
$class = (array)$class;
if ($type == 'select') {
  $class[] = 'form-select';
}
elseif ($type == 'color') {
  $class[] = 'form-control-color';
}
elseif (in_array($type, ['radio', 'checkbox'])) {
  $class[] = 'form-check-input';
}
elseif ($type == 'range') {
  $class[] = 'form-range';
}
else {
  $class[] = 'form-control';
}
if ($size) {
  $class[] = 'form-control-'.$size;
}
$class = implode(' ', $class);
@endphp

<select p-if="$type == 'select'" :class="$class" p-bind="$_context->except(['options','value','blank','size'])">
    <option p-if="$blank">{{ $blank }}</option>
    <option p-foreach="$options ?? [] as $option" p-bind="arr_except($option, 'label')" p-selected="$option['value'] == $value">{{ $option['label'] }}</option>
</select>
<textarea p-elseif="$type == 'textarea'" :class="$class" p-bind="$_context->except(['size','value'])">{{ $value }}</textarea>
<input p-else :class="$class" p-bind="$_context->except(['size'])">