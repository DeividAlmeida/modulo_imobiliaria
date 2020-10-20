function CatalogoProdutosListagem(id, pag){
  $.ajax({
    type: "GET",
    cache: false,
    url: UrlPainel+'wa/catalogo_produtos/listagem?id='+id+'&pag='+pag,
    beforeSend: function (data){
      //$("#SimpleSlideWA"+id).html("<center><br><img src=\""+UrlPainel+"wa/css_js/loading.gif\"><br>Carregando...<br></center>");
    },
    success: function (data) {
      jQuery('#CatalogoProdutosListagem'+id).html(data);
    },
    error: function (data) {
      setTimeout(function(){ CatalogoProdutosListagem(id, pag); }, 5000);
    },
  });
}
function CatalogoProdutosCarrinho(){
  $.ajax({
    type:    "GET",
    cache:   false,
    url:     UrlPainel+'wa/catalogo_produtos/carrinho',
    success: function (data) {
      jQuery('#CatalogoProdutosCarrinho').html(data);
    },
    error: function (data) {
      setTimeout(function(){ CatalogoProdutosCarrinho(); }, 5000);
    },
  });
}
function CatalogoProdutosBtnCarrinho(){
  $.ajax({
    type:    "GET",
    cache:   false,
    url:     UrlPainel+'wa/catalogo_produtos/btn_carrinho',
    success: function (data) {
      jQuery('#CatalogoProdutosBtnCarrinho').html(data);
    },
    error: function (data) {
      setTimeout(function(){ CatalogoProdutosBtnCarrinho(); }, 5000);
    },
  });
}
function CatalogoProdutosBuscaResultado(pag){
  const urlParams = new URLSearchParams(window.location.search);
  const busca     = urlParams.get('b');

  $.ajax({
    type:    "GET",
    cache:   false,
    url:     UrlPainel+'wa/catalogo_produtos/busca/resultado.php?b='+busca+'&pag='+pag,
    success: function (data) {
      jQuery('#CatalogoProdutosBuscaResultado').html(data);
    },
    error: function (data) {
      setTimeout(function(){ CatalogoProdutosBuscaResultado(); }, 5000);
    },
  });
}
function CatalogoProdutosBuscador(){
  $.ajax({
    type:    "GET",
    cache:   false,
    url:     UrlPainel+'wa/catalogo_produtos/busca/buscador.php',
    success: function (data) {
      jQuery('#CatalogoProdutosBuscador').html(data);
    },
    error: function (data) {
      setTimeout(function(){ CatalogoProdutosBuscador(); }, 5000);
    },
  });
}
function CatalogoProdutosSlider(id){
  $.ajax({
    type: "GET",
    cache: false,
    url: UrlPainel+'wa/catalogo_produtos/slider?id='+id,
    beforeSend: function (data){
      //$("#SimpleSlideWA"+id).html("<center><br><img src=\""+UrlPainel+"wa/css_js/loading.gif\"><br>Carregando...<br></center>");
    },
    success: function (data) {
      jQuery('#CatalogoProdutosSlider'+id).html(data);
    },
    error: function (data) {
      setTimeout(function(){ CatalogoProdutosSlider(id); }, 5000);
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

  $("#shop--list"+idList+" .shop--list__content .shop--product").each(function() {
    $(this).attr('class', 'shop--product '+columnClass);
  });
}
function CarrinhoAdd(id, carrinho_url){
  $.ajax({
    type: 	"GET",
    cache: 	false,
    url: 		UrlPainel+'wa/catalogo_produtos/carrinho?AddItem='+id,
    beforeSend: function (data){
      $('.shop--product-page--header__button').html("Adicionando ao carrinho...");
    },
    success: function () {
      $('.shop--product-page--header__button').html("Comprar");
      Swal.fire({
        type:  'success',
				title: "Item adicionado no carrinho",
        showConfirmButton: false,
        showCloseButton: true,
        html: '<p>Clique no botão abaixo para ir para o carrinho ou clique no X para continuar comprando</p><a class="btn btn-primary shop--modal-add-product__btn" href="'+carrinho_url+'">Ver carrinho</a>'
			});
    }
  });
}
