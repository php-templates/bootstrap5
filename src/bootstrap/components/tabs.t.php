@php
$id = $id ?? 't-'.uniqid();
@endphp

<div :class="['d-flex align-items-start'=>$vertical||$vertical==='']">
    <ul class="nav nav-tabs" :class="[$class, 'flex-column'=>$vertical||$vertical==='']" :id="$id" role="tablist">
      <li p-foreach="$items as $val=>$label" class="nav-item" role="presentation">
        <button class="nav-link" :class="$val===$value || (!$value && $loop->IsFirst()) ? 'active' : ''" :id="$val.'-tab'" data-bs-toggle="tab" :data-bs-target="'#'.$val" type="button" role="tab" :aria-controls="$val" aria-selected="true">{{ $label }}</button>
      </li>
    </ul>
    <div class="tab-content">
      <div p-foreach="$items as $k => $tmp" class="tab-pane" :class="['fade'=>!isset($fade) || $fade, 'show active'=>$value==$k || (!$value && $loop->IsFirst())]" :id="$k" role="tabpanel" :aria-labelledby="$k.'-tab'">
         @php $tmp = $this->slots($k); $this->slots($k) && reset($tmp)([]); @endphp
      </div>
    </div>
</div>