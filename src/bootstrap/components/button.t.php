@php
$_attrs = $_context->except(['href','v','class','size','disabled']);
@endphp
<a p-if="$href" :class="['btn btn-'.$v, $class, $size ? 'btn-'.$size : '', $disabled ? 'disabled' : '']" :href="$href" role="button" p-bind="$disabled ? ['aria-disabled' => 'true', 'tabindex' => '-1'] : []" p-bind="$_attrs">
    <slot></slot>
</a>
<button p-else :class="['btn btn-'.$v, $class, $size ? 'btn-'.$size : '']" p-bind="$_attrs" p-disabled="$disabled">
    <slot></slot>
</button>