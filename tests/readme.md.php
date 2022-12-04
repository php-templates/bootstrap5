<?php

require('../vendor/autoload.php');

use PhpTemplates\Config;
use PhpTemplates\EventHolder;
use PhpTemplates\Template;
use PhpTemplates\Bootstrap;

//header("Content-Type: text/plain");

$cfg = new Config('default', __DIR__);
$eventHolder = new EventHolder();
$viewFactory = new Template( __DIR__.'/results', $cfg, $eventHolder);
$bs = new Bootstrap;
$bs->mount($viewFactory);

function tstart()
{
    ob_start();
}

function teval()
{
    global $viewFactory;
    $php = ob_get_contents();
    ob_end_clean();
    echo $php;
    eval($php);
}

function tresult($file, $data = '[]')
{
    global $viewFactory;
    $tpl = ob_get_contents();
    ob_end_clean();
    echo "
    ".$tpl;
    eval('$_data = '.$data.';');
    echo "\nwill result:\n
```
";
ob_start();
$viewFactory->makeRaw("\n".trim(str_replace('```', '', $tpl), "\n")."\n", $_data)->render();
$tpl = ob_get_contents();
ob_end_clean();
echo trim($tpl);
echo "\n```
";
    return $tpl;
}

ob_start();
?>

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
<?php tstart(); ?>
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
<?php tresult('accordion-example.t.php', '[]'); ?>

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
<?php tstart(); ?>
```
<b-alert type="success" title="Well done" dismiss>
    <p class="m-0">Aww yeah, you successfully read this important alert message</p>
</b-alert>
```
<?php tresult('alert-example.t.php', '[]'); ?>

## Badge
### props
- `v` - bs theme colors
- `class` - extra classes
### slots
- `default` - text value of the badge
<?php tstart(); ?>
```
<b-badge v="success" class="rounded-pill">12</b-badge>
```
<?php tresult('badge-example.t.php', '[]'); ?>

## Breadcrumb
### props
- `:items` - an array holding items of form `['label'=>'Displayed', 'value'=>'href']`
- `class` - extra classes
<?php tstart(); ?>
```
<b-breadcrumb :items="[['label'=>'Home','value'=>'/'],['label'=>'Product','value'=>'/product']]"/>
```
<?php tresult('breadcrumb-example.t.php', '[]'); ?>

## Button
### props
- `v` - variant - primary, secondary, etc
- `class` - extra classes
- `href` - if given, it will render an anchor instead of button
- `size` - sm, lg (btn-*)
- `disabled` - true/no value = disabled
<?php tstart(); ?>
```
<b-button v="primary">OK</b-button>
<b-button v="primary" href="yoo" onclick="'return false;'">OK</b-button>
```
<?php tresult('button-example.t.php', '[]'); ?>

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
<?php tstart(); ?>
```
<b-card header="Lorem" footer="Ipsum">
    Sit amen
</b-card>
```
<?php tresult('button-example.t.php', '[]'); ?>

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
<?php tstart(); ?>
```
<b-dropdown type="dropup" size="sm" v="primary" :items="[['type' => 'title', 'text' => 'dd Title'], ['type' => 'separator'], ['type' => 'text', 'text' => 'dd Text', 'disabled' => 1], ['type' => 'item', 'text' => 'dd Item']]" label="Btn Label" ul_class="dropdown-menu-end"></b-dropdown>
```
<?php tresult('dropdown-example.t.php', '[]'); ?>

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
<?php tstart(); ?>
```
<b-modal id="mymodal" title="Demo modal" centered static>
    modal body
    <tpl slot="footer">
        <b-button v="primary">Btn</b-button>
    </tpl>
</b-modal>
```
<?php tresult('modal-example.t.php', '[]'); ?>

## Nav
### props
- `:items` - an array holding items of form `['label'=>'Displayed', 'value'=>'href', 'disabled'=>$optional, 'active'=>$optional]`
- `class` - extra classes

<?php tstart(); ?>
```
<b-nav class="bg-light" :items="[
    ['label'=>'Lorem', 'active' => true],
    ['label'=>'ipsum', 'value'=>'sit', 'disabled'=>true]
]"></b-nav>
```
<?php tresult('nav-example.t.php', '[]'); ?>

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

<?php tstart(); ?>
```
<b-tabs :items="['lorem'=>'Lorem','ipsum'=>'Ipsum']" value="ipsum">
    <div slot="lorem">lorem</div>
    <div slot="ipsum">ipsum</div>
</b-tabs>
```
<?php tresult('tabs-example.t.php', '[]'); ?>

## Offcanvas
### props
- `pos` - .offcanvas position, default top
- `class` - .offcanvas extra classes
- `id` - .offcanvas id
- `scroll` - body scroll allowed or not
- `backdrop` - .offcanvas backdrop
### slots
- default - offcanvas body child nodes

<?php tstart(); ?>
```
<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">Toggle top offcanvas</button>

<b-offcanvas id="offcanvasTop" title="Lorem Ipsum">
  ...
</b-offcanvas>
```
<?php tresult('offcanvas-example.t.php', '[]'); ?>

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


<?php
$md = ob_get_contents();
file_put_contents(__DIR__ . '/../readme.md', trim($md));
?>