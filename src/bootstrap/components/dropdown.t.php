@php
$id = $id ? $id : 'dd-'.uniqid();
$_attrs = $_context->except(['type','v','size','label','ul_class','items']);
@endphp

<div :class="$type ? $type : 'dropdown'">
  <button class="btn dropdown-toggle" :class="['btn-'.$v, $size ? 'btn-'.$size : '']" type="button" data-bs-toggle="dropdown" aria-expanded="false" p-bind="$_attrs">
    <slot name="btn-inner">{{ $label }}</slot>
  </button>
  <ul class="dropdown-menu" :class="$ul_class" :aria-labelledby="$id">
    <slot>
      <li p-foreach="$items as $item">
        <hr p-if="$item['type'] == 'separator'" class="dropdown-divider">
        <span p-elseif="$item['type'] == 'text'" class="dropdown-item-text" p-bind="arr_except($item, ['text','active','href','disabled'])">{{ $item['text'] }}</span>
        <h6 p-elseif="$item['type'] == 'title'" class="dropdown-header" p-bind="arr_except($item, ['text','active','href','disabled'])">{{ $item['text'] }}</h6>
        <a p-else class="dropdown-item" :class="['disabled' => !empty($item['disabled']), 'active' => !empty($item['active'])]" :href="!empty($item['href']) ? $item['href'] : 'javascript:;'" p-bind="!empty($item['disabled']) ? ['tabindex' => '-1', 'aria-disabled' => 'true'] : []" p-bind="arr_except($item, ['text','active','href','disabled'])">{{ $item['text'] }}</a>
      </li>
    </slot>
  </ul>
</div>