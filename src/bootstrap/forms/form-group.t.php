@php
    $id = $id ?? 'f-'.uniqid();
    $placeholder = $placeholder ?? $label;
    $attrs = $_context->except(['label','error','class', 'inline']);
    $isCheckbox = in_array($type,['checkbox','radio']);
    $isInputGroup = $prepend || $append || $this->slots('prepend') || $this->slots('append');
    
    $formClass = 'form-group mb-3';
  
    $labelClass = 'form-label';
    if ($inline) {
        $labelClass .= ' col-sm-2 col-form-label';
        if ($size) {
            $labelClass .= ' col-form-label-'.$size;
        }
    }
@endphp

<div class="form-group mb-3" :class="[$class, 'form-check'=>$isCheckbox, 'form-check-inline'=>$isCheckbox && isset($inline), 'form-switch'=>$type=='switch', 'row'=>isset($inline) && !$isCheckbox]">
  <slot name="label" p-if="!$isCheckbox">
    <label :for="$id" :class="$labelClass">{{ $label }}</label>
  </slot>
  <div :class="['col-sm-10'=>$inline && !$isCheckbox]">
      <div :class="['input-group'=>$isInputGroup, $size && $isInputGroup ? 'input-group-'.$size : '']">
        <slot name="prepend">
          <span class="input-group-text" p-if="$prepend">{{ $prepend }}</span>
        </slot>
        <slot p-bind="['attrs' => $attrs]">
          <tpl is="bootstrap:forms/form-control" p-bind="$attrs"></tpl>
        </slot>
        <slot name="append">
          <span class="input-group-text" p-if="$append">{{ $append }}</span>
        </slot>
      </div>
      <span p-if="!$isCheckbox" class="error-bag">
        <div p-if="$error" class="text-danger">{{ $error }}</div>
      </span>
  </div>
  <slot name="label" p-if="$isCheckbox">
    <label :for="$id" class="form-check-label">{{ $label }}</label>
  </slot>
  <span p-if="$isCheckbox" class="error-bag">
    <div p-if="$error" class="text-danger">{{ $error }}</div>
  </span>
</div>