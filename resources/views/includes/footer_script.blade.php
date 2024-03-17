<!-- admin -->
<!--deletemodal-->
<div class="modal" id="deletemodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
            <form method="POST" action="{{ url('/') }}/delete_record" id="delete_data" enctype="multipart/form-data">
             @csrf
             
            <input type="hidden" readonly class="form-control input-style" name="table_name" id="table_name" required>
            <input type="hidden" readonly class="form-control input-style" name="id" id="del_id" required>
            <label for="" class="input__label" style="color:red">Are you sure you want to delete this record? </label>
                          
             <div class="modal-footer">
              <button type="button" data-bs-dismiss="modal" class="btn btn-warning">Cancel</button>
              <button type="submit" class="btn btn-danger">Yes</button>
             </div>
       </form>
    </div>
  </div>
</div>
</div>
<!--enddeletemodal--> 


<!-- Core JS -->
 <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    
<script src="{{ asset('assets/vendor/js/jquery-3.3.1.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('assets/vendor/js/script.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script> 

<script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>

<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>-->
<script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.22.1/dist/extensions/export/bootstrap-table-export.min.js"></script>
<script src="{{ asset('assets/vendor/js/jquery.toast.js') }}"></script>


     
<script>
function deleterecord(id,tablename){
   document.getElementById("del_id").value=id;
   document.getElementById("table_name").value=tablename;
    $('#deletemodal').modal('show');
}

//delete_data
$("#delete_data").on("submit",function(e)
{e.preventDefault();
$(".loader").css("display","block");
$.ajax
({
type: "POST",
url:  e.target.action,
data: $('#delete_data').serialize(),
success: function (response)
{
// alert(response);
if (response.error =="1")
{
$.toast({  heading:  "<i class='fa fa-warning' ></i> "+response.error_msg, position: 'top-right',stack: false})
$(".loader").css("display","none");
}
else
{
$.toast({ heading: response.success_msg, position: 'top-right',stack: false,icon: 'success'})
$(".loader").css("display","none");
setTimeout(function(){window.location.href="";}, 2000);
}
}
}); 
});


// var forms = document.querySelectorAll('#myform')
  
// Array.prototype.slice.call(forms).forEach(function (form) {
// form.addEventListener('submit', function (event) {
// if(!form.checkValidity()) {
// event.preventDefault()
// event.stopPropagation()
// }
// else 
// {
// event.preventDefault();
// $(".loader").css("display","block");
// $.ajax
// ({
// type: "POST",
// url:  event.target.action,
// data: $('#myform').serialize(),
// success: function (response)
// {
// // alert(response);
// if (response.error =="1")
// {
// $.toast({  heading:  "<i class='fa fa-warning' ></i> "+response.error_msg, position: 'top-right',stack: false})
// $(".loader").css("display","none");
// }
// else
// {
// $.toast({ heading: response.success_msg, position: 'top-right',stack: false,icon: 'success'})
// $(".loader").css("display","none");
// setTimeout(function(){window.location.href="";}, 2000);
// }
// }
// }); 
// }
// form.classList.add('was-validated')
// }, false)
// });





//Submit myform
 $('#myform').submit(function(e) {
 e.preventDefault();
   
         $(".loader").css("display","block");
	var obj = $(this), action_name = obj.attr('name'); 
	var form = $(this)[0];
	var data = new FormData(form);
	data.append("tag", action_name);
	$.ajax
	({
		type: "POST",
		url:  e.target.action,
		data: data,
		processData: false,
		contentType: false,
		cache: false,
		dataType: "json",
		success: function (response) 
		{
        //   alert(response);
        
          if (response.error =="1") 
			{
				$.toast({  heading: 'Error', text: response.error_msg, position: 'top-right',stack: false,icon: 'error'})
			$(".loader").css("display","none");
			
			} 
			else
			{
				$.toast({ heading: response.success_msg, position: 'top-right',stack: false,icon: 'success'})
				$(".loader").css("display","none");
		           
		           
		    	setTimeout(function() 
				{
			setTimeout(function(){window.location.href="";}, 2000);
				}, 2000);
			}
		}
	});
       
    
})



</script>
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js'></script>


 <script>
   var toastMixin = Swal.mixin({
     toast: true,
     icon: 'success',
     title: 'General Title',
     animation: false,
     position: 'bottom',
     showConfirmButton: false,
     timer: 4000,
     timerProgressBar: true,
     didOpen: (toast) => {
       toast.addEventListener('mouseenter', Swal.stopTimer)
       toast.addEventListener('mouseleave', Swal.resumeTimer)
     }
   });
 </script>