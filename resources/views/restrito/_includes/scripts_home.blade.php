<input type="hidden" id="token" value="{{csrf_token()}}"/>
<form id='logout-form' action='{{ url('/logout')}}' method='POST' style='display: none;'>
    {{ csrf_field() }}
</form>    
<script>
    function deletar(urlDeletar) {
        jQuery("#urlDeletar").val(urlDeletar);
        swal({
            title: "Deseja deletar?",
            text: "Após exclusão você não será capaz de recuperar este arquivo.",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn red",
            confirmButtonText: "Sim, remova!",
            cancelButtonClass: "btn white",
            cancelButtonText: "Cancelar",
            closeOnConfirm: false,
            closeOnCancel: false
        },
                function (isConfirm) {
                    if (isConfirm) {
                        var urlDeletar = jQuery("#urlDeletar").val();
                        var csrf = jQuery("#token").val();
                        jQuery.ajax({
                            url: urlDeletar,
                            method: 'POST',
                            data: {'_token': csrf}
                        }).done(function (data) {
                            if (data == "1") {
                                swal({
                                    title: "Excluido!",
                                    text: "Seu arquivo foi excluído com sucesso!",
                                    type: "success",
                                    confirmButtonClass: "btn-success"
                                });
                                setTimeout('location.reload();', 2000);
                            } else {
                                jQuery(".errors-msg-delete").html(data);
                                jQuery(".errors-msg-delete").show();
                            }
                        }).fail(function () {
                            alert('Falha deletar arquivo.');
                        });
                    } else {
                        swal({
                            title: "Cancelado!",
                            text: "Seu arquivo está seguro.",
                            type: "error",
                            confirmButtonClass: "btn red"
                        });
                    }
                });
    }
    function fot(urlFoto) {
        jQuery.getJSON(urlFoto, function (data) {
            jQuery.each(data, function (key, val) {
                jQuery(' *[name="' + key + '"] ').val(val);
            });
        });
        jQuery('#modalFormFoto').modal('show');
        jQuery("#form").attr("form-send", urlFoto);
        jQuery("#form").attr("action", urlFoto);
        erase();
        return false;
    }
</script>