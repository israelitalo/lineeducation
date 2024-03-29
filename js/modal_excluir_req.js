$(document).ready(function () {
    $('a[data-confirm]').click(function (ev) {
        var href = $(this).attr('href');
        if(!$('#confirm-delete').length){
            $('body').append('<!-- Modal -->\n' +
                '<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">\n' +
                '  <div class="modal-dialog" role="document">\n' +
                '    <div class="modal-content">\n' +
                '      <div class="modal-header bg-dark">\n' +
                '        <h5 class="modal-title text-white" id="exampleModalLabel">Excluir Requerimento</h5>\n' +
                '        <button type="button" class="close" data-dismiss="modal" aria-label="Close">\n' +
                '          <span aria-hidden="true">&times;</span>\n' +
                '        </button>\n' +
                '      </div>\n' +
                '      <div class="modal-body">\n' +
                '        Deseja realmente excluir este requerimento?\n' +
                '      </div>\n' +
                '      <div class="modal-footer">\n' +
                '        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>\n' +
                '        <a class="btn btn-danger text-white" id="dataConfirmOk">Excluir</a>\n' +
                '      </div>\n' +
                '    </div>\n' +
                '  </div>\n' +
                '</div>');
        }
        $('#dataConfirmOk').attr('href', href);
        $('#confirm-delete').modal({shown: true});
        return false;
    });

});