<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>

<script type="text/javascript">
    $('input[type=radio][data-toggle=radio-collapse]').each(function(index, item) {
        var $item = $(item);
        var $target = $($item.data('target'));

        $('input[type=radio][name="' + item.name + '"]').on('change', function() {
            if($item.is(':checked')) {
                $target.collapse('show');
            } else {
                $target.collapse('hide');
            }
        });
    });
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->