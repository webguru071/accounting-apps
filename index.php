<?php
session_start();
$username=$_SESSION['username'];
if(!$_SESSION['username'])
{
  header('location:logout.php');
}
else{
  include 'db_connect.php' ;
  include 'header.php' ;
  ?>
  <link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css">
  <script src="js/bootstrap-select.min.js"></script>
  <div class="container no-print">
    <h2 class="heade-title">Journal</h2>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-5 no-print">

        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title text-center">Journal</h3>
          </div>
          <div class="panel-body">
            <form action="" method="post">
              <div class="row">
                <div class="col-md-6 bright">
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                        <label for="code" class="form-control-label"><i class="fa fa-cube"></i>&nbsp;Title <strong>(Debit)</strong></label>
                        <select class="form-control selectpicker" data-live-search="true" id="d_title" name="d_title">
                          <option value="">SELECT</option>
                          <?php 

                          $select = "SELECT  title FROM ac_list order by title asc" ;
                          $ex = mysqli_query($conn,$select);
                          while($row = mysqli_fetch_array($ex))
                          {
                            ?>
                            <option value="<?php echo $row[0]; ; ?>"><?php echo $row[0]; ?></option>
                            <?php
                          }
                          ?>

                        </select>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                        <label for="code" class="form-control-label"><i class="fa fa-barcode"></i>&nbsp;Code <strong>(Debit)</strong></label>
                        <input type="text" id="d_code" class="form-control input-sm" placeholder="Code(Debit)"  readonly="true">
                        <input type="hidden" name="d_type" id="d_type">
                      </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                        <label for="code" class="form-control-label"><i class="fa fa-money"></i>&nbsp;Amount <strong>(Debit)</strong></label>
                        <input type="text" id="d_amount" class="form-control input-sm" placeholder="amount(Debit)" >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                        <label for="code" class="form-control-label"><i class="fa fa-cube"></i>&nbsp;Title <strong>(Credit)</strong></label>
                        <select class="form-control selectpicker" data-live-search="true" id="c_title" name="c_title">
                          <option value="" id="op">SELECT</option>
                          <?php 

                          $select = "SELECT  title FROM ac_list order by title asc" ;
                          $ex = mysqli_query($conn,$select);
                          while($row = mysqli_fetch_array($ex))
                          {
                            ?>
                            <option value="<?php echo $row[0]; ; ?>"><?php echo $row[0]; ?></option>
                            <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                        <label for="code" class="form-control-label"><i class="fa fa-barcode"></i>&nbsp;Code <strong>(Credit)</strong></label>
                        <input type="text"  id="c_code" class="form-control input-sm" placeholder="Code(Credit)"  readonly="true">
                        <input type="hidden" name="c_type" id="c_type">
                      </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                        <label for="code" class="form-control-label"><i class="fa fa-money"></i>&nbsp;Amount <strong>(Credit</strong></label>
                        <input type="text"  id="c_amount" class="form-control input-sm" placeholder="amount(Credit)" REQUIRED>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-6 col-sm6  col-md6 ">
                  <div class="form-group">
                    <label for="code" class="form-control-label"><i class="fa fa-calendar"></i>&nbsp;Date of Transaction</label>
                    <input type="date" name="date" id="date" class="form-control input-sm" value="<?php echo date('Y-m-d'); ?>" required>
                  </div>
                </div>
                <div class="col-xs-6 col-sm6  col-md6 ">
                  <div class="form-group">
                    <label for="code" class="form-control-label"><i class="fa fa-calendar"></i>&nbsp;Description</label>
                    <input type="text" name="description" id="description" placeholder="Description..." class="form-control input-sm">
                  </div>
                </div>
              </div>
              <button class="btn btn-block gc" type="button" onclick="add()" name="submit_journal"><i class="fa fa-plus"></i>&nbsp;Confirm</button>
            </form>
          </div>
        </div>
        <div class="alert alert-success collapse" role="alert" id="ss"><b>Well done!</b> You successfully read this important alert message.</div>
        <div class="alert alert-danger collapse" role="alert" id="ff"><b>Oh snap!</b>Fill the full form up and try submitting again.</div>
        
      </div>
      <div class="col-md-7">
        <div class="table-responsive">
          <form class="navbar-form navbar-right no-print">
            <div class="form-group">
              <input type="text" class="form-control" id="search" placeholder="Search">
            </div>
            <button type="button" onclick="search()" class="btn btn-default"><i class="fa fa-search"></i>&nbsp;</button>
          </form>
          <table id="tabledit" class="table table-hover table-bordered">
            <thead>
              <tr class="danger">
                <th class="no-print">
                  <button class="btn btn-block no-print gc no-print"  onclick="window.print();"  ><i class="fa fa-print"></i>&nbsp;Print</button>
                </th>
                <th colspan="9" class="text-center">Journal Report</th>
              </tr>
              <tr class="bg-info">
                <th style="width:10%">Sl</th>
                <th>date</th>
                <th>code</th>
                <th>title</th>
                <th>debit</th>
                <th>credit</th>
                <th>description</th>
                <th class="no-print">Action</th>
              </tr>
            </thead>
            <tbody class="bg-warning">
            </tbody>
          </table>
        </div>
      </div>
      <script>
        $(document).ready(function(){
          viewData();
        });
        
        $('#c_title').change(function() {
          var a=$(this).val();
          if(a != ""){
            $.ajax({
              url:'include/ac_code.php',
              method:"POST",
              data:{cd:a},
              success:function(value){
                var data = value.split(",");
                $('#c_code').val(data[0]);
                $('#c_type').val(data[1]);
              }
            });
          }
        });
        $('#d_title').change(function() {
          var a=$(this).val();
          if(a != ""){
            $.ajax({
              url:'include/ac_code.php',
              method:"POST",
              data:{cd:a},
              success:function(value){
                var data = value.split(",");
                $('#d_code').val(data[0]);
                $('#d_type').val(data[1]);
              }
            });
          }
        });

        $('#d_amount').keyup(function() {
          var a=$(this).val();
          $('#c_amount').val(a);
        });
        $('#c_amount').keyup(function() {
          var a=$(this).val();
          $('#d_amount').val(a);
        });


        // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        function add(){
          var s = confirm("Confirm  Add ?");
          if (s == true) {

            var d_code = $('#d_code').val();
            var c_code = $('#c_code').val();
            var d_title = $('#d_title').val();
            var c_title = $('#c_title').val();
            var date = $('#date').val();
            var d_amount = $('#d_amount').val();
            var c_amount = $('#c_amount').val();
            var d_type = $('#d_type').val();
            var c_type = $('#c_type').val();
            var description = $('#description').val();

            if(c_code == "" || d_code == "" || c_amount == "" ){
              $('#ff').show('fade');
              setTimeout(function(){
                $('#ff').hide('fade');
              },2000);
            }
            else{
              $.ajax({
                url:'include/journal.php',
                method:"POST",
                data:{d_code:d_code,d_title:d_title,c_code:c_code,c_title:c_title,date:date,d_type:d_type,c_type:c_type,d_amount:d_amount,c_amount:c_amount,description:description},
                success:function(){
                  viewData();
                  $('#ss').show('fade');
                  setTimeout(function(){
                    $('#ss').hide('fade');
                  },2000);
                }

              });

            }
          }};

          function viewData(){

            $.ajax({
              url: 'include/journal.php?p=view',
              method: 'GET'
            }).done(function(data){
              $('tbody').html(data);
            });
          }
        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        // search..............//
        $('#search').keyup(function(){
          var a = $(this).val();
          if (a == '') {
            viewData();
          }else{
            search();
          }
        });

        function search(){

          var s = $('#search').val();

          if(s != "" )
          {
            $.ajax({
              url:"include/journal-search-related.php",
              method:"POST",
              data:{search:s},
              success:function(data){
                $('tbody').html(data);
                //searchData();
              },
              error:function(data){
                viewData();
              }
            }); 
          }
          else
          {
            viewData();
          }
        }
        function searchData(){
          $('#tabledit').Tabledit({
            url: 'include/journal-search-related.php',
            eventType: 'dblclick',
            editButton: true,
            deleteButton: true,
            hideIdentifier: false,
            buttons: {
              edit: {
                class: 'btn btn-sm btn-warning',
                html: '<span class="glyphicon glyphicon-pencil"></span>',
                action: 'edit'
              },
              delete: {
                class: 'btn btn-sm btn-danger',
                html: '<span class="glyphicon glyphicon-trash"></span>',
                action: 'delete'
              },
              save: {
                class: 'btn btn-sm btn-success',
                html: 'Save'
              },
              restore: {
                class: 'btn btn-sm btn-warning',
                html: 'Restore',
                action: 'restore'
              },
              confirm: {
                class: 'btn btn-sm btn-default',
                html: 'Confirm'
              }
            },
            columns: {
              identifier: [2, 'id'],
              editable: [[1, 'title'],[3, 'type']]
            },
            onSuccess: function(data, textStatus, jqXHR) {
              search();
            },
            onFail: function(jqXHR, textStatus, errorThrown) {
              console.log('onFail(jqXHR, textStatus, errorThrown)');
              console.log(jqXHR);
              console.log(textStatus);
              console.log(errorThrown);
            },
            onAjax: function(action, serialize) {
              console.log('onAjax(action, serialize)');
              console.log(action);
              console.log(serialize);
            }
          });
        }
      </script>
    </div>
  </div>

  <?php
  include 'footer.php' ;
}
?>
