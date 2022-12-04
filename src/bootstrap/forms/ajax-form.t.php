<form class="b-ajax-form" p-bind="$_context->all()">
    <slot></slot>
</form>

<script>
    $(document).on('submit', '.b-ajax-form', function() {
        let form = $(this);
        let url = $(this).attr('action');
        let type = $(this).attr('method').toUpperCase();
        let cb = $(this).attr('callback');
        form.find('.error-bag').html('');
        $.ajax({
            url: url,
            data: $(this).serialize(),
            dataType: 'json',
            type: type,
            headers: {'ajax-form': true},
            success(res, s, xhr) {
                if (xhr.status == 422) {
                    let errorsBag = form.find('.errors-bag');
                    Object.keys(res.errors).forEach(k => {
                        let container = errorsBag;
                        if (!container.length) {
                            container = form.find('[name="' + k + '"]')
                            .closest('.form-group')
                            .find('.error-bag');
                        }
                        container.append('<div class="text-danger">' + res.errors[k] + '</div>');
                    });
                } else {
                    if (res.redirect) {
                        window.location = res.redirect;
                    } else if (cb) {
                        window[cb](res);
                    }
                }
            }
        });
        return false;
    });
</script>

<?php return function ($process) {
    $process->data->scripts['footer'][] = $this->querySelector('script')->detach();
} ?>