function ImobiliariaListagem(id, pag){
  $.ajax({
    type: "GET",
    cache: false,
    url: UrlPainel+'wa/imobiliaria/listagem?id='+id+'&pag='+pag,
    beforeSend: function (data){
      //$("#SimpleSlideWA"+id).html("<center><br><img src=\""+UrlPainel+"wa/css_js/loading.gif\"><br>Carregando...<br></center>");
    },
    success: function (data) {
      jQuery('#ImobiliariaListagem'+id).html(data);
    },
    error: function (data) {
      setTimeout(function(){ ImobiliariaListagem(id, pag); }, 5000);
    },
  });
}
function ImobiliariaCarrinho(){
  $.ajax({
    type:    "GET",
    cache:   false,
    url:     UrlPainel+'wa/imobiliaria/carrinho',
    success: function (data) {
      jQuery('#ImobiliariaCarrinho').html(data);
    },
    error: function (data) {
      setTimeout(function(){ ImobiliariaCarrinho(); }, 5000);
    },
  });
}
function ImobiliariaBtnCarrinho(){
  $.ajax({
    type:    "GET",
    cache:   false,
    url:     UrlPainel+'wa/imobiliaria/btn_carrinho',
    success: function (data) {
      jQuery('#ImobiliariaBtnCarrinho').html(data);
    },
    error: function (data) {
      setTimeout(function(){ ImobiliariaBtnCarrinho(); }, 5000);
    },
  });
}
function ImobiliariaBuscaResultado(pag){
  const urlParams = new URLSearchParams(window.location.search);
  const busca     = urlParams.get('b');

  $.ajax({
    type:    "GET",
    cache:   false,
    url:     UrlPainel+'wa/imobiliaria/busca/resultado.php?b='+busca+'&pag='+pag,
    success: function (data) {
      jQuery('#ImobiliariaBuscaResultado').html(data);
    },
    error: function (data) {
      setTimeout(function(){ ImobiliariaBuscaResultado(); }, 5000);
    },
  });
}
function ImobiliariaBuscador(){
  $.ajax({
    type:    "GET",
    cache:   false,
    url:     UrlPainel+'wa/imobiliaria/busca/buscador.php',
    success: function (data) {
      jQuery('#ImobiliariaBuscador').html(data);
    },
    error: function (data) {
      setTimeout(function(){ ImobiliariaBuscador(); }, 5000);
    },
  });
}
function ImobiliariaSlider(id){
  $.ajax({
    type: "GET",
    cache: false,
    url: UrlPainel+'wa/imobiliaria/slider?id='+id,
    beforeSend: function (data){
      //$("#SimpleSlideWA"+id).html("<center><br><img src=\""+UrlPainel+"wa/css_js/loading.gif\"><br>Carregando...<br></center>");
    },
    success: function (data) {
      jQuery('#ImobiliariaSlider'+id).html(data);
    },
    error: function (data) {
      setTimeout(function(){ ImobiliariaSlider(id); }, 5000);
    },
  });
}
function shopUpdateListView(idList, isGrid, columnClass){
  if(isGrid){
    $("#shop--list"+idList+" .shop--list__content").removeClass('is-list');
    $("#shop--list"+idList+" .shop--list__content").addClass('is-grid');
    $("#shop--list"+idList+" .shop--list--bar__view-grid").addClass('is-active');
    $("#shop--list"+idList+" .shop--list--bar__view-list").removeClass('is-active');
  }
  else{
    $("#shop--list"+idList+" .shop--list__content").removeClass('is-grid');
    $("#shop--list"+idList+" .shop--list__content").addClass('is-list');
    $("#shop--list"+idList+" .shop--list--bar__view-grid").removeClass('is-active');
    $("#shop--list"+idList+" .shop--list--bar__view-list").addClass('is-active');
  }

  $("#shop--list"+idList+" .shop--list__content .shop--imovel").each(function() {
    $(this).attr('class', 'shop--imovel '+columnClass);
  });
}
function CarrinhoAdd(id, carrinho_url){
  $.ajax({
    type: 	"GET",
    cache: 	false,
    url: 		UrlPainel+'wa/imobiliaria/carrinho?AddItem='+id,
    beforeSend: function (data){
      $('.shop--imovel-page--header__button').html("Adicionando ao carrinho...");
    },
    success: function () {
      $('.shop--imovel-page--header__button').html("Comprar");
      Swal.fire({
        type:  'success',
				title: "Item adicionado no carrinho",
        showConfirmButton: false,
        showCloseButton: true,
        html: '<p>Clique no botão abaixo para ir para o carrinho ou clique no X para continuar comprando</p><a class="btn btn-primary shop--modal-add-imovel__btn" href="'+carrinho_url+'">Ver carrinho</a>'
			});
    }
  });
}
