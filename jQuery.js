//cart total price
$(document).ready(function() {        
    $(".checked").click(function(event) {
        var total = 0;
        $(".checked:checked").each(function() {
            total += parseInt($(this).val());
        });
        
        if (total == 0) {
            $('#text').val('');
        } else {                
            $('#text').val(total);
        }
    });
}); 

//genre suggestion add a book

$(document).ready(function(){
	$("#suggest").keyup(function(){
		$.get("phpCode/suggest_genre.php", {genre: $(this).val()}, function(data){
			$("datalist").empty();
			$("datalist").html(data);
		});
	});
});

//author suggestion
$(document).ready(function(){
	$("#suggestAuthorName").keyup(function(){
		$.get("phpCode/suggest_authorname.php", {name: $(this).val()}, function(data){
			$("datalist").empty();
			$("datalist").html(data);
		});
	});
});

$(document).ready(function(){
	$("#suggestAuthorSurname").keyup(function(){
		$.get("phpCode/suggest_authorsurname.php", {surname: $(this).val()}, function(data){
			$("datalist").empty();
			$("datalist").html(data);
		});
	});
});
//search book

$(document).ready(function(){
	$("#suggestBook").keyup(function(){
		$.get("phpCode/suggest_book.php", {book: $(this).val()}, function(data){
			$("datalist").empty();
			$("datalist").html(data);
		});
	});
});


