@php
$id = $id ?? 'accordion-' . md5(json_encode($items));
@endphp
<div class="accordion" :id="$id" :class="$open ? 'open' : ''" :class="$class">
  <div class="accordion-item" p-foreach="$items as $k => $val">
    <h2 class="accordion-header" :id="'ah-'.$k">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" :data-bs-target="'#ac-'.$k" :aria-expanded="(!$value && $loop->isFirst()) || $k == $value ? 'true' : 'false'" :aria-controls="$k">
        {{ $val }}
      </button>
    </h2>
    <div :id="'ac-'.$k" class="accordion-collapse collapse" :class="(!$value && $loop->isFirst()) || $k == $value ? 'show' : ''" :aria-labelledby="'ah-'.$k" p-raw="$toggle ? 'data-bs-parent=\"#'.$id.'\"' : ''">
      <div class="accordion-body">
        @php $this->slots($k) && reset($this->slots($k))([]); @endphp
      </div>
    </div>
  </div>
</div>