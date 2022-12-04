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
else {
  $class[] = 'form-control';
}
if ($size) {
  $class[] = 'form-control-'.$size;
}
@endphp

<select p-if="$type == 'select'" p-bind="$_context->except(['options','value','blank','size'])">
    <option p-if="$blank">{{ $blank }}</option>
    <option p-foreach="$options ?? [] as $option" p-bind="arr_except($option, 'label')" p-selected="$option['value'] == $value">{{ $option['label'] }}</option>
</select>
<textarea p-elseif="$type == 'textarea'" class="form-control" p-bind="$_context->except(['size','value'])">{{ $value }}</textarea>
<input p-elseif="$type == 'range'" class="form-range" p-bind="$_context->except(['size'])">
<input p-else p-bind="$_context->except(['size'])">