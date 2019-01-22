$(document).ready(function(){
	//gera novas linhas ao clicar
	$(".new").click(function(){
		var tipo = $(this).data('type');
		var cls  = $(this).data('class');
		
		$("#"+tipo).append("<p><input class=\""+cls+"\" type=\""+tipo+"\" name=\""+tipo+"[]\"></p>");
	});
	
	//seleciona datas
	$('.data').datepicker({
		format: 'dd/mm/yyyy'
	});
	
	//mascara os telefones com 8 ou 9 dígitos
	//ref. https://igorescobar.github.io/jQuery-Mask-Plugin/docs.html
	var mascara = function(val){
		return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
	};
	var options = {
		onKeyPress: function(val, e, field, options) {
			field.mask(mascara.apply({}, arguments), options);
		},
		placeholder: '(xx) xxxxx-xxxx'
	};
	$('.fone').mask(mascara, options);
	$('.mask-data').mask('00/00/0000', {placeholder: 'xx/xx/xxxx'});
});