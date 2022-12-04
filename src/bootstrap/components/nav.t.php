<ul class="nav" :class="$class">
  <li class="nav-item" p-foreach="$items as $item">
    <a class="nav-link" 
        p-bind="!empty($item['active']) ? ['aria-current'=>'page','class'=>'active'] : []" 
        :href="!empty($item['value']) ? $item['value'] : 'javascript:;'" 
        p-bind="!empty($item['disabled']) ? ['class'=>'disabled','tabindex'=>'-1','aria-disabled'=>'true'] : []">
        {{ $item['label'] }}</a>
  </li>
</ul>