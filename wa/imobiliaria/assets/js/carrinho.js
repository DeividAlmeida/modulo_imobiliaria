(function($) {
  'use strict';

  // Imprimir carrinho
  $('#cartPrint').click(function(){
    printJS('shop--cart--table', 'html')
  });

  // Atualizar carrinho
  $('.cart_qtd_update').click(function(){
    var parent = $(this).parent();
    var btn_id = parent.attr('id');

    var id_imovel = parseInt(btn_id.split("cart_qtd_")[1]);
    var qtd = parseInt(parent.find('input').val());

    $.ajax({
      type: 	"GET",
      cache: 	false,
      url: 		UrlPainel+'wa/imobiliaria/carrinho/?UpdateQtd&id='+id_imovel+'&qtd='+qtd,
      beforeSend: function (data){
        $('.shop--cart__block').addClass("is-active");
      },
      success: function () {
        ImobiliariaCarrinho();
      }
    });
  })

  // Remove item do carrinho
  $('.cart_qtd_delete').click(function(){
    var parent = $(this).parent();
    var btn_id = parent.attr('id');
    var id_imovel = parseInt(btn_id.split("cart_qtd_")[1]);

    $.ajax({
      type: 	"GET",
      cache: 	false,
      url: 		UrlPainel+'wa/imobiliaria/carrinho/?RemItem='+id_imovel,
      beforeSend: function (data){
        $('.shop--cart__block').addClass("is-active");
      },
      success: function () {
        ImobiliariaCarrinho();
      }
    });
  })

  $('#formCarrinho').submit(function (e) {
		// Para de enviar o formulario
		e.preventDefault();

		// Faz solicitação via AJAX
		$.ajax({
			type: 				'POST',
			cache: 				false,
			url: 					UrlPainel+'wa/imobiliaria/carrinho/?EnviarEmail',
			data: 				$(this).serialize(),
      beforeSend: function (data){
        $("#formCarrinho .btnSubmit").attr("disabled", true).html("Enviando...");
      },
      success: function () {
        $('#formCarrinho').empty();
        $('#formCarrinho').html('');
        $('#formCarrinhoSucesso').attr('style', '');
      },
      error: function () {
        $("#formCarrinho .btnSubmit").attr("disabled", true).html("Erro interno. Tente novamente mais tarde.");
      }
		})
	});
})(jQuery);
