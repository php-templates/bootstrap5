<nav aria-label="breadcrumb" :class="$class">
  <ol class="breadcrumb">
    <tpl p-foreach="$items as $item">
        <li p-if="!$loop->isLast()" class="breadcrumb-item"><a :href="$item['value']">{{ $item['label'] }}</a></li>
        <li p-else class="breadcrumb-item active" aria-current="page">{{ $item['label'] }}</li>
    </tpl>
  </ol>
</nav>