$(document).ready(function(){
	//alterna o layout (linhas / colunas)
	$(".cursor-pointer").on("click touchstart",function(){
		$(this).toggleClass("fa-th").toggleClass("fa-th-list");
		$("#results .col-12").toggleClass("col-sm-6").toggleClass("col-md-4");
	});
	
	$(".cell").on("click touchstart",function(){
		var alvo = $(this).data("target");
		$(alvo).toggleClass("visible");
	});
	
	//carregamento inicial da lista de contatos
	var $page	= ('core/--contacts.php');
	var $result = $("#results");
	
	$result.load($page);
	
	//carrega algum contato específico pela busca
    $('#search input').on("keyup input", function(){
        var inputVal = $(this).val();
        
        if(inputVal.length){
            $.get($page, {term: inputVal}).done(function(data){
                $result.html(data);
            });
        }else{
			$result.load($page);
		}
    });
});