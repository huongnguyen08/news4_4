<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
<section class="content">
    <div class="panel panel-default">
        <div class="panel-heading"><b>Danh sách tin tức</b>
        </div>
        <div class="panel-body">
        	
         	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			    <thead>
			      <tr>
			        <th>STT</th>
			        <th>Tiêu đề</th>
			        <th style="width: 10%">Tóm tắt</th>
			        <th>Nội dung</th>
			        <th>Hình</th>
			        <th>Số lượt xem</th>
			        <th>Nổi bật</th>
			        <th style="width: 10%">#</th>
			      </tr>
			    </thead>
			    
			    <tbody>
			    <?php
			    $stt = 1;
			    foreach($data as $tin){

			    
			    ?>
			   
			      <tr>
			        <td><?=$stt?></td>
			        <td><?=$tin->TieuDe?></td>
			        <td><?=$tin->TomTat?></td>
			        <td><?=$tin->NoiDung?></td>
			        <td><img src="../public/images/tintuc/<?=$tin->Hinh?>" width="100"></td>
			        <td><?=$tin->SoLuotXem?></td>
			        <td><input type="checkbox"<?=$tin->NoiBat==1?"checked":''?>></td>
			        <td><span class="glyphicon glyphicon-pencil" aria-hidden="true" style="font-size: 18px"></span> | <span class="glyphicon glyphicon-trash" aria-hidden="true" style="font-size: 18px" idTinTuc="<?=$tin->id?>" id="btnDelete<?=$tin->id?>	"></span></td>

			        <div id="myModal<?=$tin->id?>" class="modal fade" role="dialog">
				  		<div class="modal-dialog">

						    <!-- Modal content-->
						    <div class="modal-content">
						    
						      <div class="modal-body">
						        <p>Bạn có chắc chắn xóa?</p>
						      </div>
						      <div class="modal-footer">
						      	<a href="#" id="confirmDelete<?=$tin->id?>" class="btn btn-success" >OK</a>
						      	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				        		
						      </div>
						    </div>

					    </div>
					</div>


			      </tr>
			    <?php
			    $stt+=1; //stt=stt+1
			    }
			    ?>
			    </tbody>
			  </table>
        </div>
    </div>
</section>
<script src="public/js/jquery.js"></script>
<script>
$(document).ready(function(){
	$('span[id^="btnDelete"]').click(function(){
			var idTin = $(this).attr('idTinTuc')
			$('#myModal'+idTin).modal('show');

			$('#confirmDelete'+idTin).click(function(){
				$.ajax({
					type:"GET",
					data:{
						id:idTin //tên biến gửi đi:value
					},
					url:"delete_tintuc.php",
					success:function(){
						location.reload();
					},
					error:function(){
						console.log('err')
					}
				})
				
			})


			// $('#myModal').on('show.bs.modal', function (e) {
		    
   			// });
	})
})
</script>
