
 
<?php include('../mode/top.php') ?>

<!-- page content -->
       <div class="right_col" role="main">
         <div class="">
           <div class="page-title">
            <div class="title_left">
             <br>
             
              
              
             </div>
           <div class="clearfix"></div>
           <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_panel">
                 <div class="x_title">
                   <h2>Laporan Penduduk</h2>
                   <ul class="nav navbar-right panel_toolbox">
                     <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                     </li>
                     <li class="dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                     <li><a class="close-link"><i class="fa fa-close"></i></a>
                     </li>
                   </ul>
                   <div class="clearfix"></div>
                 </div>
                 <div class="x_content">
                   <p class="text-muted font-13 m-b-30"> 
                   </p>
                   <!--  -->
                         <form id="form" data-parsley-validate class="form-horizontal form-label-left" method="post" action="laporanproses.php">
                           <table class="table table-striped" >
                           <thead>
                             <tr>
                             </tr>
                              <tr>
                             </tr>
                           </thead>
                           <tbody>
                             <tr>
                               <td><a>PILIH BULAN</a></td>
                               <td>
                               <div class="form-group">
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                   <select class="form-control" name="bulan" required="required">
                                     <option value="" ></option>
                                     <option value="01"> JANUARI</option>
                                     <option value="02"> FEBRUARI</option>
                                     <option value="03"> MARET</option>
                                     <option value="04"> APRIL</option>
                                     <option value="05"> MEI</option>
                                     <option value="06"> JUNI</option>
                                     <option value="07"> JULI</option>
                                     <option value="08"> AGUSTUS</option>
                                     <option value="09"> SEPTEMBER</option>
                                     <option value="10"> OKTOBER</option>
                                     <option value="11"> NOVEMBER</option>
                                     <option value="12"> DESEMBER</option>
                                   </select>
                                 </div>
                               </div>
                               </td>
                             </tr>
                              <tr>
                               <td ><a>TAHUN</a></td>
                               <td><input  class="form-control col-md-6 col-sm-6 col-xs-12" name="tahun" required="required"/></td>
                             </tr>                              
                             <tr>
                               <td><a>NAMA KEPALA DESA</a></td>
                               <td><input  class="form-control col-md-6 col-sm-6 col-xs-12" name="kepala_desa" required="required"/></td>
                             </tr>
                             <tr>
                               <td><input type="submit" value="Laporan Penduduk" class="btn btn-dark"/></td>
                             </tr>
                         </form>
                     </tbody>
                   </table>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
       </div>
       
       <!-- /page content -->

<?php include('../mode/bottom.php') ?>