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

function ImobiliariaBuscaResultado(){
    let ar = [];
    for(let i = 0; i < 13; i++){
         ar[i] = sessionStorage.getItem(i);
    }

  $.ajax({
    type:    "GET",
    cache:   false,
    url:     UrlPainel+'wa/imobiliaria/buscador/resultado.php?acao='+ar[0]+'&tipo='+ar[1]+'&cidade='+ar[2]+'&bairro='+ar[3]+'&quartos='+ar[4]+'&banheiros='+ar[5]+'&valor='+ar[6]+'&garagem='+ar[7]+'&mobiliado='+ar[8]+'&pet='+ar[9]+'&livre='+ar[10]+'&metros='+ar[11]+'&procurar='+ar[12],
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
    url:     UrlPainel+'wa/imobiliaria/buscador',
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
