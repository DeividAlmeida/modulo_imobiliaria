function CountProductView(id) {
  $.ajax({
    type: "GET",
    cache: false,
    url: UrlPainel + 'wa/imobiliaria/imoveis/count_view.php?id=' + id
  });
}
function ImobiliariaRelacionadosListagem(id) {
  $.ajax({
    type: "GET",
    cache: false,
    url: UrlPainel + 'wa/imobiliaria/imoveis_relacionados?id=' + id,
    success: function (data) {
      jQuery('#ImobiliariaRelacionadosListagem').html(data);
    },
    error: function (data) {
      setTimeout(function () { ImobiliariaRelacionadosListagem(id); }, 5000);
    },
  });
}
function ImobiliariaMaisVistos() {
  $.ajax({
    type: "GET",
    cache: false,
    url: UrlPainel + 'wa/imobiliaria/imovel_mais_vistos',
    success: function (data) {
      jQuery('#ImobiliariaMaisVistos').html(data);
    },
    error: function (data) {
      setTimeout(function () { ImobiliariaMaisVistos(); }, 5000);
    },
  });
}