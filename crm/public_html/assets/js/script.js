var ModalApp = {};
ModalApp.ModalProcess = function (parameters) {
    this.id = parameters['id'] || 'modal';
    this.selector = parameters['selector'] || '';
    this.title = parameters['title'] || 'Управление товаром';
    this.body = parameters['body'] || '';
    this.footer = parameters['footer'] || '<button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть</button>';
    this.content = '<div class="modal fade" id="' + this.id + '" tabindex="-1" role="dialog">' +
        '<div class="modal-dialog" role="document">' +
        '<div class="modal-content">' +
        '<div class="modal-header">' +
        '<h5 class="modal-title">' + this.title + '</h5>' +
        '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
        '</div>' +
        '<div class="modal-body">' + this.body + '</div>' +
        '<div class="modal-footer">' + this.footer + '</div>' +
        '</div>' +
        '</div>' +
        '</div>';
    this.init = function () {
        if ($('#' + this.id).length === 0) {
            $('body').prepend(this.content);
        }
        if (this.selector) {
            $(document).on('click', this.selector, $.proxy(this.showModal, this));
        }
    }
};
ModalApp.ModalProcess.prototype.changeTitle = function (content) {
    $('#' + this.id + ' .modal-title').html(content);
};
ModalApp.ModalProcess.prototype.changeBody = function (content) {
    $('#' + this.id + ' .modal-body').html(content);
};
ModalApp.ModalProcess.prototype.changeFooter = function (content) {
    $('#' + this.id + ' .modal-footer').html(content);
};
ModalApp.ModalProcess.prototype.showModal = function () {
    $('#' + this.id).modal('show');
};
ModalApp.ModalProcess.prototype.hideModal = function () {
    $('#' + this.id).modal('hide');
    location.reload();
};
ModalApp.ModalProcess.prototype.updateModal = function () {
    $('#' + this.id).modal('handleUpdate');
};