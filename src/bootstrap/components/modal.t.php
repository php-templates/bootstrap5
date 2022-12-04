@php
$id = $id ? $id : 'mdl-'.uniqid();
$_attrs = [];
if ($static) {
    $_attrs['data-bs-backdrop'] = 'static';
}
$_attrs['data-bs-keyboard'] = $esc === '' ? 'true' : 'false';
@endphp

<div class="modal" :class="[!isset($fade) || $fade ? 'fade' : '', $class]" :id="$id" p-bind="$_attrs" tabindex="-1" :aria-labelledby="$id" aria-hidden="true">
  <div class="modal-dialog" :class="['modal-dialog-scrollable'=>$scrollable==='', 'modal-dialog-centered'=>$centered==='', $size ? 'modal-'.$size : '']">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><slot name="title">{{ $title }}</slot></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <slot></slot>
      </div>
      <div p-if="$this->slots('footer')" class="modal-footer">
        <slot name="footer"></slot>
      </div>
    </div>
  </div>
</div>