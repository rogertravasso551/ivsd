

	
	$(function(){
        $("#sortme").sortable();
        $('#submit').click(function(event){
            var postData = $("#sortme").sortable("serialize");
            
			console.log(postData);
           $.post('rep_update.php', {list: postData}, function(o){
		console.log(o);
		}, 'json');
		  window.location.replace("new_Visuals.php");
        });
		 
		});