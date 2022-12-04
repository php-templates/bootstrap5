@php
$_attrs = $_context->except(['$img','alt','header','footer']);
@endphp

<div class="card" p-bind="$_attrs">
  <img p-if="$img" :src="$img" class="card-img-top" :alt="$alt">
  <div p-if="$header || $this->slots('header')" class="card-header">
    <slot name="header">{{ $header }}</slot>
  </div>
  <slot name="above"></slot>
  <div class="card-body">
    <slot></slot>
  </div>
  <slot name="below"></slot>
  <div p-if="$footer || $this->slots('footer')" class="card-footer">
    <slot name="footer">{{ $footer }}</slot>
  </div>
</div>