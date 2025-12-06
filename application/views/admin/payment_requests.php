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
                            Payment Requests
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="responsiveDataTable" class="table table-bordered text-nowrap w-100 overflow-auto">
                                <thead>
                                    <tr>
                                        <th>Order Id</th>
                                        <th>Email</th>
                                        <th>Full name</th>
                                        <th>amount</th>
                                        <th>Date</th>
                                        <th>Server</th>
                                        <th>Trading Id</th>
                                        <th>Password</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($payRec as $rec){ ?>
                                    <tr>
                                        <td><?php echo $rec['order_id'];?></td>
                                        <td><?php echo $rec['email'];?></td>
                                        <td><?php echo $rec['full_name'];?></td>
                                        <td><?php echo $rec['amount'];?></td>
                                        <td><?php echo date('d/m/Y',strtotime($rec['created_at']));?></td>
                                        <td><?php echo $rec['server'];?></td>
                                        <td><?php echo $rec['td_id'];?></td>
                                        <td><?php echo base64d($rec['td_password']);?></td>
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