<?php $this->load->view('admin/common/header'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">
        <!-- Start:: row-2 -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="top-left"></div>
                    <div class="top-right"></div>
                    <div class="bottom-left"></div>
                    <div class="bottom-right"></div>
                    <div class="card-header">
                        <div class="card-title">
                            Introducing Alpha
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="responsiveDataTable" class="table table-bordered text-nowrap w-100 overflow-auto">
                                <thead>
                                    <tr>
                                        <th>Email</th>
                                        <th>Full name</th>
                                        <th>Refferal code</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($payRec as $rec){ 
                                        $id = base64e($rec['itroducing_alpha_id']);
                                        $status = $rec['status'];
                                        if($status == 1){
                                            $showSts = 'Approved';
                                        }elseif($status == 2){
                                            $showSts = 'Declined';
                                        }else{
                                            $showSts = 'Pending';
                                        }
                                    ?>
                                    <tr>
                                        <td><?php echo $rec['email'];?></td>
                                        <td><?php echo $rec['full_name'];?></td>
                                        <td><?php echo $rec['referal_code'];?></td>
                                        <td><?php echo $showSts;?></td>
                                        <td>
                                            <a href="<?php echo site_url('admin/change_alphaib_status/'.$id.'/1');?>" class="btn btn-success">Approve</a>
                                            <a href="<?php echo site_url('admin/change_alphaib_status/'.$id.'/0');?>" class="btn btn-danger">Cancel</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End:: row-2 -->
    </div>
</div>
<!-- End::app-content -->
<?php $this->load->view('admin/common/footer'); ?>
<!-- Datatables Cdn -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<!-- Internal Datatables JS -->
<script src="<?php echo base_url('assets/js/datatables.js'); ?>"></script>