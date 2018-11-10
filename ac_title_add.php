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
  <div class="container no-print">
    <h2 class="heade-title">Add New Accounts</h2>
  </div>
  <div class="container">
    <div class="row">
      <!-- select -->
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title text-center"> A/C Title & Code</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <label for="code" class="form-control-label"><i class="fa fa-barcode"></i>&nbsp;Code</label>
                  <input type="text" name="code" id="code" class="form-control input-sm" placeholder="Code" REQUIRED>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <label for="title" class="form-control-label"><i class="fa fa-cube"></i>&nbsp;Title</label>
                  <input type="text" name="title" id="title" class="form-control input-sm" placeholder="Title" REQUIRED>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <label for="title" class="form-control-label"><i class="fa fa-cube"></i>&nbsp;A/C Redirection</label>
                  <select id="type" name="type"  class="form-control input-sm">
                    <option value="t">Trading Accounts</option>
                    <option value="p">Profit & loss Accounts</option>
                    <option value="b">Balance Sheet</option>
                  </select>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <label for="date" class="form-control-label"><i class="fa fa-list-ol"></i>&nbsp;Date</label>
                  <input type="date" name="date" id="date" class="form-control input-sm" value="<?php echo date('Y-m-d'); ?>" required>
                </div>
              </div>
            </div>
            <button class="btn btn-block gc" id="click" onclick="addToBank()" ><i class="fa fa-plus"></i>&nbsp;Confirm</button>
          </div>
        </div>
        <div class="alert alert-success collapse" role="alert" id="success"><b>Well done!</b> You successfully read this important alert message.</div>
        <div class="alert alert-danger collapse" role="alert" id="failed"><b>Oh snap!</b>Fill the full form up and try submitting again.</div>
      </div>
      <!-- selected -->
      <!-- search -->
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" id="search" placeholder="Search">
        </div>
        <button type="button" onclick="search()" class="btn btn-default"><i class="fa fa-search"></i>&nbsp;</button>
      </form>
      <div class="col-md-8 ">
        <div class="table-responsive">
          <table id="tabledit" class="table table-hover table-bordered" >
            <thead>
              <tr class="success">
                <th colspan="5" class="text-center">Product List</th>
              </tr>
              <tr class="info">
                <th>SL.</th>
                <th>TITLE</th>
                <th>CODE</th>
                <th>TYPE</th>
                <th>DATE</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="bg-info">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script src="js/jquery.tabledit.js"></script>
  <script>
    $(document).ready(function(){
      viewData();
      id_generate();
    });
    function id_generate(){
      $.ajax({
       url: 'include/ac_id_generate.php',
       method:'POST',
       data:{data:"data"}
     }).done(function(data){
      $('#code').val(data);
    })
   }
   var input = document.getElementById("title");
   input.addEventListener("keyup", function(event) {
    event.preventDefault();
    if (event.keyCode === 13) {
      document.getElementById("click").click();
    }
  });
   function addToBank(){
    var s = confirm("Confirm  Add ?");
    if (s == true) {
      var code = $('#code').val();
      var title = $('#title').val();
      var date = $('#date').val();
      var type = $('#type').val();
      if(code != "" && title != ""){

        $.ajax({
          url:'include/ac-related.php',
          method:"POST",
          data:{code:code,title:title,date:date,type:type},
          success:function(){
            $('#success').show('fade');
            setTimeout(function(){$('#success').hide('fade');},2000);
            viewData();
            id_generate();
            $('#title').focus();
          }

        });
      }
      else{
        $('#failed').show('fade');
        setTimeout(function(){
          $('#failed').hide('fade');
        },2000);

      }
    }};

    function viewData(){

      $.ajax({
        url: 'include/ac-related.php?p=view',
        method: 'GET'
      }).done(function(data){
        $('tbody').html(data);
        tableData();
      })
    }
    function tableData(){
      $('#tabledit').Tabledit({
        url: 'include/ac-related.php',
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
          viewData();
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
            url:"include/search-related.php",
            method:"POST",
            data:{search:s},
            success:function(data){
              $('tbody').html(data);
              searchData();
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
          url: 'include/search-related.php',
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
    <?php
    include 'footer.php' ;
  }
  ?>
