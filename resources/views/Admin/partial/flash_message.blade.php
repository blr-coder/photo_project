<!-- Flash Message -->
<div class="modal fade" id="flashMessageModal" tabindex="-1" role="dialog" aria-labelledby="flashMessageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="flashMessageModal">Success</h5>
                <button type="button" class="close" style="font-size: 12px" data-dismiss="modal" aria-label="Close">
                    close
                </button>
            </div>
            <div class="modal-body">
                {!! Session::get('flash_message') !!}
            </div>
        </div>
    </div>
</div>

<script>
    $('#flashMessageModal').modal('show')
</script>
