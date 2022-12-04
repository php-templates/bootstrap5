<b-ajax-form action="/tests/ajax-form.php" method="post" callback="doSomething">
    <b-form-group name="foo" type="text" label="label"></b-form-group>
    <b-button v="primary">Submit</b-button>
</b-ajax-form>

<script>
    function doSomething() {
        alert(1)
    }
</script>

<footer></footer>

<?php return function ($process) {
    $footer = $this->querySelector('footer');
    foreach ($process->data->scripts['footer'] ?? [] as $script) {
        $footer->appendChild($script);
    }
} ?>