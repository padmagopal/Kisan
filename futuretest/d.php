
								<buton type="button" class="btn btn-success" data-toggle="modal" data-target="#edit" id="<?php echo $row['product_id'];?>" onclick="get_itemdetails(this.id)">
									function get_itemdetails(id){
								     $.ajax({
								         url:"get_itemdetails.php",
								         method:"post",
								         data:{id:id},
								         success:function(data){
								             data=JSON.parse(data);
								             $("#name").val(data[0]);
								             $("#amt").val(data[1]);
								             $("#pid").val(data[2]);
								             $("#ctg").val(data[3]);
								         }
								     })
								    }
