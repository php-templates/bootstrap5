## Php Templates - Bootstrap5 components
### Instalation & Setup
- `composer require php-templates/bootstrap5` 
or 
- download project and include `Bootstrap.php` file.

```
use PhpTemplates\Bootstrap;

$cfg = new Config('default', __DIR__);
$eventHolder = new EventHolder();
$viewFactory = new Template( __DIR__.'/results', $cfg, $eventHolder);

$bs = new Bootstrap;
$bs->mount($viewFactory);
```

## Accordion
### props
- `:items` - an associative array holding accordion-item::id => accordion-item::title
- `class` - extra classes to `.accordion`
- `toggle` - if true/no-value, prevent multiple items to be opened at same time
- `open` - true/no-value to render an accordion that’s expanded
### slots
- add each accordion body under a slot with name coresponding to accordion-item::id

    ```
<b-accordion :items="['lorem' => 'Lorem', 'ipsum' => 'Ipsum']" toggle open>
    <div slot="lorem">
        lorem
    </div>
    <div slot="ipsum">
        ipsum
    </div>
</b-accordion>
```

will result:

```
<div class="accordion open " id="accordion-42a87caa5e4606fbccab0def3569c8df">
      <div class="accordion-item">
      <h2 class="accordion-header" id="ah-lorem">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#ac-lorem" aria-expanded="true" aria-controls="lorem">
        Lorem      </button>
      </h2>
      <div id="ac-lorem" class="accordion-collapse collapse show" aria-labelledby="ah-lorem" data-bs-parent="#accordion-42a87caa5e4606fbccab0def3569c8df">
        <div class="accordion-body">
        <div>
        lorem
    </div>
      </div>
      </div>
    </div>
      <div class="accordion-item">
      <h2 class="accordion-header" id="ah-ipsum">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#ac-ipsum" aria-expanded="false" aria-controls="ipsum">
        Ipsum      </button>
      </h2>
      <div id="ac-ipsum" class="accordion-collapse collapse " aria-labelledby="ah-ipsum" data-bs-parent="#accordion-42a87caa5e4606fbccab0def3569c8df">
        <div class="accordion-body">
        <div>
        ipsum
    </div>
      </div>
      </div>
    </div>
  </div>
```

## Alert
### props
- `type` - bs5 theme colors (primary, secondary, etc)
- `title` - alert h4 title (optional)
- `dismiss` - display dismiss button
- `icon` - hide alert icon if false
### slots
- `default` - alert message
- `title` - title override, if a complex one is needed
- `icon` - slot for icon

    ```
<b-alert type="success" title="Well done" dismiss>
    <p class="m-0">Aww yeah, you successfully read this important alert message</p>
</b-alert>
```

will result:

```
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <div class="d-flex">
          <div class="d-flex align-items-center pe-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                      </svg>
              </div>
        <div class="flex-fill">
                <h4 class="alert-heading">Well done</h4>
        <p class="m-0">Aww yeah, you successfully read this important alert message</p>
    </div>
  </div>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
```

## Badge
### props
- `v` - bs theme colors
- `class` - extra classes
### slots
- `default` - text value of the badge

    ```
<b-badge v="success" class="rounded-pill">12</b-badge>
```

will result:

```
<span class="badge rounded-pill bg-success">
  12
</span>
```

## Breadcrumb
### props
- `:items` - an array holding items of form `['label'=>'Displayed', 'value'=>'href']`
- `class` - extra classes

    ```
<b-breadcrumb :items="[['label'=>'Home','value'=>'/'],['label'=>'Product','value'=>'/product']]"/>
```

will result:

```
<nav aria-label="breadcrumb" class="">
  <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Product</li>
        </ol>
</nav>
```

## Button
### props
- `v` - variant - primary, secondary, etc
- `class` - extra classes
- `href` - if given, it will render an anchor instead of button
- `size` - sm, lg (btn-*)
- `disabled` - true/no value = disabled

    ```
<b-button v="primary">OK</b-button>
<b-button v="primary" href="yoo" onclick="'return false;'">OK</b-button>
```

will result:

```
<button class="btn btn-primary ">
    OK
  </button>
<a class="btn btn-primary  " href="yoo" role="button" onclick="'return false;'">
    OK
  </a>
```

## Card
### props
- `header` - card header text
- `footer` - card footer text
- `img` - card image src
- `alt` - card image alt
- `class` - custom img class
### slots
- `default` - .card-body content
- `header` - .card-header content
- `above` - above .card-body
- `below` - below .card-body
- `footer` - .card-footer content

    ```
<b-card header="Lorem" footer="Ipsum">
    Sit amen
</b-card>
```

will result:

```
<div class="card">
      <div class="card-header">
      Lorem    </div>
    <div class="card-body">
        Sit amen
  </div>
      <div class="card-footer">
      Ipsum    </div>
  </div>
```

## Dropdown
### props
- `type` - dropdown(default), dropup, dropstart, dropend
- `v` - primary, secondary, etc
- `size` - sm, md, lg, etc
- `id` - button id
- `label` - button text
- `ul_class` - list class
- `:items` - an array of items where item like ['type' => 'title,text,separator or item', 'text' => 'item text', 'href' => $optional, 'disabled' => $optional, 'active' => $optional, '_attrs' => $optionalItemBinds]
### slots
- `default` - the dropdown content if custom content required
- `btn-inner` - button childnode

    ```
<b-dropdown type="dropup" size="sm" v="primary" :items="[['type' => 'title', 'text' => 'dd Title'], ['type' => 'separator'], ['type' => 'text', 'text' => 'dd Text', 'disabled' => 1], ['type' => 'item', 'text' => 'dd Item']]" label="Btn Label" ul_class="dropdown-menu-end"></b-dropdown>
```

will result:

```
<div class="dropup">
  <button class="btn dropdown-toggle btn-primary btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="dd-638a8a56c14f3">
    Btn Label  </button>
  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dd-638a8a56c14f3">
            <li>
                      <h6 class="dropdown-header" type="title">dd Title</h6>
                  </li>
              <li>
                      <hr class="dropdown-divider">
                  </li>
              <li>
                      <span class="dropdown-item-text" type="text">dd Text</span>
                  </li>
              <li>
                      <a class="dropdown-item" href="javascript:;" type="item">dd Item</a>
                  </li>
        </ul>
</div>
```

## Modal
### props
- `title` - modal title
- `fade` - if false, no fade effect applied
- `size` - sm, md, lg, etc
- `id` - modal id
- `class` - modal class
- `esc` - if should close on esc keypress
- `scrollable` - if modal is scrollable
- `centered` - if modal should be vertically centered
### slots
- `default` - modal body
- `header` - .modal-header childNodes
- `footer` - .modal-footer childNodes

    ```
<b-modal id="mymodal" title="Demo modal" centered static>
    modal body
    <tpl slot="footer">
        <b-button v="primary">Btn</b-button>
    </tpl>
</b-modal>
```

will result:

```
<div class="modal fade" id="mymodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mymodal" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          Demo modal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            modal body
      </div>
              <div class="modal-footer">
            <button class="btn btn-primary ">
    Btn
  </button>
        </div>
          </div>
  </div>
</div>
```

## Nav
### props
- `:items` - an array holding items of form `['label'=>'Displayed', 'value'=>'href', 'disabled'=>$optional, 'active'=>$optional]`
- `class` - extra classes


    ```
<b-nav class="bg-light" :items="[
    ['label'=>'Lorem', 'active' => true],
    ['label'=>'ipsum', 'value'=>'sit', 'disabled'=>true]
]"></b-nav>
```

will result:

```
<ul class="nav bg-light">
      <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="javascript:;">
        Lorem</a>
    </li>
      <li class="nav-item">
      <a class="nav-link disabled" href="sit" tabindex="-1" aria-disabled="true">
        ipsum</a>
    </li>
  </ul>
```

## Tabs
### props
- `:items` - associative array holding $tab_id => $label
- `value` - selected tab by id
- `vertical` - if you want tabs to be vertical
- `class` - extra .nav-tabs classes
- `id` - .nav-tabs id
- `fade` - if false, no fade effect
### slots
- one slot for each $tab_id may be passed


    ```
<b-tabs :items="['lorem'=>'Lorem','ipsum'=>'Ipsum']" value="ipsum">
    <div slot="lorem">lorem</div>
    <div slot="ipsum">ipsum</div>
</b-tabs>
```

will result:

```
<div >
  <ul class="nav nav-tabs" id="t-638a8a56c3361" role="tablist">
          <li class="nav-item" role="presentation">
        <button class="nav-link " id="lorem-tab" data-bs-toggle="tab" data-bs-target="#lorem" type="button" role="tab" aria-controls="lorem" aria-selected="true">Lorem</button>
      </li>
          <li class="nav-item" role="presentation">
        <button class="nav-link active" id="ipsum-tab" data-bs-toggle="tab" data-bs-target="#ipsum" type="button" role="tab" aria-controls="ipsum" aria-selected="true">Ipsum</button>
      </li>
      </ul>
  <div class="tab-content">
          <div class="tab-pane fade" id="lorem" role="tabpanel" aria-labelledby="lorem-tab">
         <div>lorem</div>
      </div>
          <div class="tab-pane fade show active" id="ipsum" role="tabpanel" aria-labelledby="ipsum-tab">
         <div>ipsum</div>
      </div>
      </div>
</div>
```

## Offcanvas
### props
- `pos` - .offcanvas position, default top
- `class` - .offcanvas extra classes
- `id` - .offcanvas id
- `scroll` - body scroll allowed or not
- `backdrop` - .offcanvas backdrop
### slots
- default - offcanvas body child nodes


    ```
<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">Toggle top offcanvas</button>

<b-offcanvas id="offcanvasTop" title="Lorem Ipsum">
  ...
</b-offcanvas>
```

will result:

```
<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">Toggle top offcanvas</button>
<div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" data-bs-scroll="false" data-bs-backdrop="false" aria-labelledby="offcanvasTopLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasTopLabel">Lorem Ipsum</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
      ...
  </div>
</div>
```

## Form group
Create form-group structures in a single line using `b-form-group` tag. You can create input groups, prepends, appends, inline forms and column forms of any type.
### props
- `type` - text, textarea, checkbox, select, switch, etc...
- `class` - form-group extra class
- `size` - form-control size
- `options` - when type = select, an array of [label=>text,value=>value] structures
- `prepend` - prepend text
- `append` - append text
- p-bind is present on form-control to pass forward any extra attribute
### slots
- prepend - prepend custom, if more then a text is needed
- append - append custom, if more then a text needed