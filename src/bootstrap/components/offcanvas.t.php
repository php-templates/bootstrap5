@php $id = $id ? $id : 'cv-'.uniqid(); @endphp
<div class="offcanvas" :class="[$class, 'offcanvas-'.($pos ?? 'top')]" tabindex="-1" :id="$id" p-bind="['data-bs-scroll'=>$scroll||$scroll==='' ? 'true' : 'false', 'data-bs-backdrop'=>$backdrop||$backdrop==='' ? 'true' : 'false']" :aria-labelledby="$id.'Label'">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" :id="$id.'Label'">{{ $title }}</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <slot></slot>
  </div>
</div>