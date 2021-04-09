$(document).ready(function () {
    $('.data-mask').mask('00/00/0000');
    $('.cep-mask').mask('00000-000');
    $('.cpf-mask').mask('000.000.000-00', { reverse: true });
    $('.cnpj-mask').mask('00.000.000/0000-00', { reverse: true });
    $('.decimal-mask').mask("#.##0,00", { reverse: true });

    var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
        spOptions = {
            onKeyPress: function (val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };

    $('.cel-mask').mask(SPMaskBehavior, spOptions);
});