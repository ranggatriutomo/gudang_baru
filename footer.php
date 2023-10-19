   
  <footer class="main-footer" style="bottom: 0;">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2023 <a href="#">IT Division</a>.</strong> 
  </footer>

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min3.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
 <!-- InputMask-->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
 <!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- CK Editor -->
<script src="bower_components/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>


<script>
$(function () {
$('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })

$('#example3').DataTable()
    $('#example4').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })

    //Initialize Select2 Elements
    $('.select2').select2()

    
    // CKEDITOR.replace('editor1')
    // //bootstrap WYSIHTML5 - text editor
    // $('.textarea').wysihtml5()



  })

function goBack() {
        window.history.back();
    }

function ubah() {
    var charCode = document.getElementById("kode");
    charCode.value = charCode.value.toUpperCase();
}


function harusHuruf(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode > 122)&&charCode>32)
            return false;
        return true;
}

   function isi_otomatis(){
    var bhp_id = $("#bhp_id").val();
    $.ajax({
        url: 'ajax.php',
        data:"bhp_id="+bhp_id ,
    }).success(function (data) {
        var json = data,
        obj = JSON.parse(json);
        $('#stok').val(obj.stok);
    });
}

$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    $("#check-all").click(function(){ // Ketika user men-cek checkbox all
      if($(this).is(":checked")) // Jika checkbox all diceklis
        $(".check-item").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"
      else // Jika checkbox all tidak diceklis
        $(".check-item").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"
    });
    
    $("#btn-update").click(function(){ // Ketika user mengklik tombol delete
      var confirm = window.confirm(" Back To Surabaya ?"); // Buat sebuah alert konfirmasi
      
      if(confirm) // Jika user mengklik tombol "Ok"
        $("#form-update").submit(); // Submit form
    });
  });

$(document).ready(function(){
  $("#a").keyup(function(){
      var input = $(this).val();
      //alert(input);
      if(input != ""){
        $.ajax({
          url: "jenis.php",
          method: "GET",
          data: {input:input},

          success:function(data){
            $("#hasil").html(data);
          }

        });
      }else{
           $("#hasil").css("display","none");
      }
  });

});



</script>
</body>
</html>
