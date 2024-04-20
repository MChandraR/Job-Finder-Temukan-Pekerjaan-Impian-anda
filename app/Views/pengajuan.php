<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" >
  <title>Document</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-3.7.1.min.js"></script>
</head>
<body>
<style>
  
  form .txt_field{
    position: relative;
    border-bottom: 2px solid #adadad;
    margin: 30px 0;
  }
  
  .txt_field input{
    width: 100%;
    padding: 0 5px;
    height: 30px;
    font-size: 16px;
    border: none;
    background: none;
    outline: none;
  }
  
  .txt_field label{
    position: absolute;
    top: 50%;
    left: 5px;
    color: #adadad;
    transform: translateY(-50%);
    font-size: 16px;
    pointer-events: none;
  }
  
  .txt_field span::before{
    content: '';
    position: absolute;
    top: 40px;
    left: 0;
    width: 0px;
    height: 2px;
    background: #2691d9;
    transition: .5s;
  }
  

</style>
  
<div style=" position: relative; background: white">
  <div style="width: 100%; height:100%; left: 0px; top: 112px; position: absolute; background: white">
  <table style="margin : 3rem 0; ">
  <tbody>
    <tr>
      <td>
        <div style="padding-left : 5rem;color: black; font-size: 20px; font-family: arial; font-weight: 400; line-height: 76.80px; word-wrap: break-word"></div>
      </td>

      <td>
        <div id="default" style="padding-left: 16px; padding-right: 16px; padding-top: 9.50px; padding-bottom: 9.50px; left: 1077px; top: 76px;  background: <?=(isset($_GET["sort"]) && ($_GET["sort"]=="asc"||$_GET["sort"]=="desc" )) ? 'white' :  '#426B1F'  ?>; border-radius: 20px; overflow: hidden;  border: 1px #C2C2C2 solid;justify-content: center; align-items: center; display: inline-flex">
          <a style="text-align: center; color:<?=(isset($_GET["sort"]) && ($_GET["sort"]=="asc"||$_GET["sort"]=="desc" )) ?  'black' : 'white' ?>; font-size: 16px; font-family: Inter; font-weight: 600; line-height: 20.80px; word-wrap: break-word ;  text-decoration:none;" href="">Pengajuan</a>
        </div>
      </td>
      <td style="padding-right:1rem;">
        <div id="available" style="padding-left: 16px; padding-right: 16px; padding-top: 9.50px; padding-bottom: 9.50px; left: 1243px; top: 76px;  background: <?=(isset($_GET["available"]) && $_GET["available"]=="true") ?   '#426B1F' : 'white'  ?>; border-radius: 20px; overflow: hidden; border: 1px #C2C2C2 solid; justify-content: center; align-items: center; display: inline-flex">
          <a style="text-align: center; color:  <?=(isset($_GET["available"]) &&$_GET["available"]=="true") ? 'white' : 'black' ?>; font-size: 16px; font-family: Inter; font-weight: 600; line-height: 20.80px; word-wrap: break-word; white-space:nowrap;  text-decoration:none;" href="">Postingan</a>
        </div>
      </td>
      <td style=" width : 95%;">
      </td>
    </tr>
  </tbody>
  </table>
  </div>
  <div style="width: 100%; height:auto; left: 0px; top: 0px; position: absolute">
    <div style="position:absolute; display:table-cell; top: 41px; left:5rem; padding-right:10px; align-content : center;" >
        <table>
          <tr>
            <td style="width:auto;">
              <div style=" color: #426B1F; font-size: 32px; font-family: Arial; font-weight: bold;  word-wrap: break-word" ><a href="home" style="text-decoration:none;  color: #426B1F;">Job Finder</a></div>
            </td>
          </tr>
        </table>
      </div>
    <div style="position:absolute; display:table-cell; top: 41px; right:0;  align-content : center;" >
      <table>
        <tr>

          <td style="padding : 0 1rem ;">
            <a style="vertical-align :supper; top: 45.50px; float:left; text-align: center; color: black; font-size: 16px; font-family: Arial; font-weight: 400; line-height: 20.80px; word-wrap: break-word; font-weight:bold; text-decoration:none;" href="home">Home</a></a>
          </td>
          <td style="padding : 0 1rem ;">
            <a style="top: 45.50px; float:left; text-align: center; color: black; font-size: 16px; font-family: Arial; font-weight: 400; line-height: 20.80px; word-wrap: break-word; font-weight:bold; text-decoration:none;" href="job">Jobs </a></div>
          </td>
          <td style="padding : 0 1rem ;">
            <a style="top: 45.50px; float:left; text-align: center; color: black; font-size: 16px; font-family: Arial; font-weight: 400; line-height: 20.80px; word-wrap: break-word; font-weight:bold; text-decoration:none;" href="pengajuan">Pengajuan</a></div>
          </td>
          <td style="padding : 0 1rem ;">
            <a style="top: 45.50px; float:left; text-align: center; color: black; font-size: 16px; font-family: Arial; font-weight: 400; line-height: 20.80px; word-wrap: break-word; font-weight:bold; text-decoration:none;" href="profile">Profile Saya</a></div>
          </td>
          <td>
            <!-- Search bar -->
            <div style="padding-left: 16px; padding-right: 16px;  left: 1243px; top: 76px;  background: white; border-radius: 20px; overflow: hidden; border: 1px #C2C2C2 solid; justify-content: center; align-items: center; display: inline-flex">
                <div class="txt_field">
                  <input type="text" name="name" id="search" required>
                </div>
                <img width="20" id="searchicon" src="images/icon/search.png"/>
              </div>
            </div>         
          </td>
          <td style="padding : 0 1rem ;">
            <div style="padding-left: 23px; padding-right: 23px; padding-top: 13.50px; padding-bottom: 13.50px;  top: 32px; background: #426B1F; border-radius: 15px; overflow: hidden; justify-content: center; align-items: center; display: inline-flex">
              <a style="text-align: center; color: white; font-size: 16px; font-family: Arial; font-weight: 600; line-height: 20.80px; word-wrap: break-word ; text-decoration:none;" href="<?=strtolower($url)?>"><?=$url?></a>
            </div>
          </td>
        </tr>
      </table>

    </div>

  </div>
  <!-- Bagian container -->


  

  <div id="container" style="padding:0 1rem 0 5rem; float:left; position:absolute; top: 250px; width:100%;">

  </div>
 
</div>
<!-- Tombol add job -->
<div style="position:fixed;padding-left: 23px; padding-right: 23px; padding-top: 13.50px; padding-bottom: 13.50px;  bottom: 1rem; right : 1rem; background: #426B1F; border-radius: 15px; overflow: hidden; justify-content: center; align-items: center; display: inline-flex">
  <a style="text-align: center; color: white; font-size: 16px; font-family: Arial; font-weight: 600; line-height: 20.80px; word-wrap: break-word ; text-decoration:none;">Post Job</a>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Daftar ajuan </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="listPengajuan">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" id="postJob">Posting</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form Pengajuan job -->
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Nama Pekerjaan</label>
          <input type="text" class="form-control" id="updateName" placeholder="Masukkan nama anda ">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Tipe Pekerjaan</label>
          <select class="form-select" aria-label="Default select example" id="updateType"required>
            <option selected value = "" >Pilih tipe pekerjaan</option>
            <?php 
              foreach($job_type as $type){
                echo ' <option value = "'.$type->type_id.'" >'.$type->type_name.'</option>';
              }
            ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
          <input type="text" class="form-control" id="updateDesc" >
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Recruitment Start</label>
          <input type="date" class="form-control" id="updateBegin" >
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Recruitment End</label>
          <input type="date" class="form-control" id="updateEnd" >
        </div>
        <!-- end -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="ajukan">Ajukan</button>
      </div>
    </div>
  </div>
</div>

</body>


<script>
    let menu = '<?= isset($_GET['menu'])? "".$_GET["menu"]."" : "" ?>' ;
    let container = document.getElementById("container");
    let updateName = document.getElementById("updateName");
    let updateType = document.getElementById("updateType");
    let updateDesc = document.getElementById("updateDesc");
    let updateBegin = document.getElementById("updateBegin");
    let updateEnd = document.getElementById("updateEnd");
    let listPengajuan = document.getElementById("listPengajuan");
    let data = [];
    console.log(container);
    console.log(menu);

    function loadDataPengajuan(idx){
        console.log(idx);
        $.ajax({
            method : "POST",
            url: "pengajuan",
            data : {
                "job_id" : data[idx].job_id
            },
            context: document.body
        }).done(function(res) {
            let datas = res["data"];
            for(let idx in datas){
                console.log(data[idx]);
                listPengajuan.innerHTML += data[idx];
            }
            
        }).fail((e)=>{
            console.log("Error :" );
            console.log(e);
        });;
    }

    function hapusPostingan(idx){
        $.ajax({
            method : "POST",
            url: "pengajuan",
            data : {
                "job_id" : data[idx].job_id
            },
            context: document.body
        }).done(function(res) {
            console.log(res);
            if(res[0].status =="sukses"){
                window.location.reload();
            }
            
        }).fail((e)=>{
            console.log("Error :" );
            console.log(e);
        });;
    }

    function tampilanPost(idx,data){
        let clas = data.status == "open" ? 'data-bs-toggle="modal" data-bs-target="#staticBackdrop"' : '';
        return '<div style="float:left;width:100%; height: auto; margin-bottom : 20px; margin-right:20px; left: 523px; top: 301px; background: #FAFAF5; border-radius: 10px; overflow: hidden; padding:10px;" >'
        + '<table style="width:100%;"><tr><td  style="padding:0 10px;"><div style="left: 24px; top: 320px;  color: black; font-size: 20px; font-family: Inter; font-weight: 600; line-height: 26px; word-wrap: break-word">'+data.job_name+' - '+data.type_name+'</div></td>'
        + ' <td rowspan="3" style=" position:relative; "> '
        + '    <div style="position:relative; right:0px;padding-left: 23px;  justify-content:center;  top: 0px; overflow: hidden; justify-content: center; align-items: center; display: inline-flex">'
        + '     <button onClick="setAttr('+idx+')" '+clas+' style="background-color :  #426B1F; font-weight:bold; border-radius: 10px; color:white;" class="btn">Update</button>'
        + '     <button style="margin-left:10px; color:red; "class="btn ">Hapus</button>'
        + '    </div> '
        +'  </td></tr>'
        + ' <tr><td  style="padding:0 10px;"><div style="left: 24px; top: 392px;  color: #6D6D6D; font-size: 16px; font-family: Inter; font-weight: 400; line-height: 24px; word-wrap: break-word">'+data.description+'</div></td></tr>'
        + ' <tr><td onclick="loadDataPengajuan('+idx+')" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width:100%;  text-align:center;"><a class="btn">Lihat data pengajuan</a></td></tr>';
        + ' </table> </div>';
    }

    function setAttr(idx){
        console.log(idx);
        updateName.value = data[idx].job_name;
        updateDesc.value = data[idx].description;
        updateType.value = data[idx].job_type_id;
        updateBegin.value = data[idx].begin;
        updateEnd.value = data[idx].end;
    }

    $.ajax({
            method : "GET",
            url: menu == "" || menu == "pengajuan" ? "myapply" : "mypost",
            context: document.body
        }).done(function(res) {
            data = res["data"];
            container.innerHTML = "";
            for(let idx in data){
                console.log(data[idx]);
                container.innerHTML += tampilanPost(idx,data[idx]);
            }
            
        }).fail((e)=>{
            console.log("Error :" );
            console.log(e);
        });;
</script>
</html>
