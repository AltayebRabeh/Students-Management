<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/apexcharts.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="row">
            <div class="col-md-6 col-xl-3 mb-4">
              <div class="card shadowy border-0">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-3 text-center">
                      <span class="circle circle-sm bg-primary-light">
                        <i class="fe fe-16 fe-users text-white mb-0"></i>
                      </span>
                    </div>
                    <div class="col pr-0">
                      <p class="small text-muted mb-0">كل الطلاب</p>
                      <span class="h3 mb-0"> <?php echo e($allStudents); ?> </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-4">
              <div class="card shadow border-0">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-3 text-center">
                      <span class="circle circle-sm bg-primary">
                        <i class="fe fe-16 fe-users text-white mb-0"></i>
                      </span>
                    </div>
                    <div class="col pr-0">
                      <p class="small text-muted mb-0">الطلاب الحاليين</p>
                      <span class="h3 mb-0"> <?php echo e($currentStudents); ?> </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-4">
              <div class="card shadow border-0">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-3 text-center">
                      <span class="circle circle-sm bg-primary">
                        <i class="fe fe-16 fe-users text-white mb-0"></i>
                      </span>
                    </div>
                    <div class="col">
                      <p class="small text-muted mb-0">الطلاب المتخرجين</p>
                      <div class="row align-items-center no-gutters">
                        <div class="col-auto">
                          <span class="h3 mr-2 mb-0"> <?php echo e($graduateStudents); ?> </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-4">
              <div class="card shadow border-0">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-3 text-center">
                      <span class="circle circle-sm bg-primary">
                        <i class="fe fe-16 fe-users text-white mb-0"></i>
                      </span>
                    </div>
                    <div class="col">
                      <p class="small text-muted mb-0">الطلاب المؤرشفين</p>
                      <span class="h3 mb-0"> <?php echo e($archiveStudents); ?> </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- charts-->
          <div class="row my-4">
            <div class="col-md-12">
              <div class="chart-box">
                <div id="lineChart"></div>
              </div>
            </div> <!-- .col -->
          </div> <!-- end section -->
          <!-- info small box -->
          <div class="row">
            <div class="col-md-4">
              <div class="card shadow mb-4">
                <div class="card-body">
                  <div class="chart-widget">
                    <div id="gradientRadial"></div>
                  </div>
                  <div class="row">
                    <div class="col-6 text-center">
                      <p class="text-muted mb-0">Yesterday</p>
                      <h4 class="mb-1">126</h4>
                      <p class="text-muted mb-2">+5.5%</p>
                    </div>
                    <div class="col-6 text-center">
                      <p class="text-muted mb-0">Today</p>
                      <h4 class="mb-1">86</h4>
                      <p class="text-muted mb-2">-5.5%</p>
                    </div>
                  </div>
                </div> <!-- .card-body -->
              </div> <!-- .card -->
            </div> <!-- .col -->
            <div class="col-md-4">
              <div class="card shadow mb-4">
                <div class="card-body">
                  <div class="chart-widget mb-2">
                    <div id="radialbar"></div>
                  </div>
                  <div class="row items-align-center">
                    <div class="col-4 text-center">
                      <p class="text-muted mb-1">Cost</p>
                      <h6 class="mb-1">$1,823</h6>
                      <p class="text-muted mb-0">+12%</p>
                    </div>
                    <div class="col-4 text-center">
                      <p class="text-muted mb-1">Revenue</p>
                      <h6 class="mb-1">$6,830</h6>
                      <p class="text-muted mb-0">+8%</p>
                    </div>
                    <div class="col-4 text-center">
                      <p class="text-muted mb-1">Earning</p>
                      <h6 class="mb-1">$4,830</h6>
                      <p class="text-muted mb-0">+8%</p>
                    </div>
                  </div>
                </div> <!-- .card-body -->
              </div> <!-- .card -->
            </div> <!-- .col -->
            <div class="col-md-4">
              <div class="card shadow mb-4">
                <div class="card-body">
                  <p class="mb-0"><strong class="mb-0 text-uppercase text-muted">Today</strong></p>
                  <h3 class="mb-0">$2,562.30</h3>
                  <p class="text-muted">+18.9% Last week</p>
                  <div class="chart-box mt-n5">
                    <div id="lineChartWidget"></div>
                  </div>
                  <div class="row">
                    <div class="col-4 text-center mt-3">
                      <p class="mb-1 text-muted">Completions</p>
                      <h6 class="mb-0">26</h6>
                      <span class="small text-muted">+20%</span>
                      <span class="fe fe-arrow-up text-success fe-12"></span>
                    </div>
                    <div class="col-4 text-center mt-3">
                      <p class="mb-1 text-muted">Goal Value</p>
                      <h6 class="mb-0">$260</h6>
                      <span class="small text-muted">+6%</span>
                      <span class="fe fe-arrow-up text-success fe-12"></span>
                    </div>
                    <div class="col-4 text-center mt-3">
                      <p class="mb-1 text-muted">Conversion</p>
                      <h6 class="mb-0">6%</h6>
                      <span class="small text-muted">-2%</span>
                      <span class="fe fe-arrow-down text-danger fe-12"></span>
                    </div>
                  </div>
                </div> <!-- .card-body -->
              </div> <!-- .card -->
            </div> <!-- .col-md -->
            <div class="col-md-6">
              <div class="card shadow mb-4">
                <div class="card-body">
                  <div class="card-title">
                    <strong>Products</strong>
                    <a class="float-right small text-muted" href="#!">View all</a>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div id="chart-box">
                        <div id="donutChartWidget"></div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="row align-items-center my-3">
                        <div class="col">
                          <strong>Cloud Server</strong>
                          <div class="my-0 text-muted small">Global, Services</div>
                        </div>
                        <div class="col-auto">
                          <strong>+85%</strong>
                        </div>
                        <div class="col-3">
                          <div class="progress" style="height: 4px;">
                            <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                      <div class="row align-items-center my-3">
                        <div class="col">
                          <strong>CDN</strong>
                          <div class="my-0 text-muted small">Global, Services</div>
                        </div>
                        <div class="col-auto">
                          <strong>+75%</strong>
                        </div>
                        <div class="col-3">
                          <div class="progress" style="height: 4px;">
                            <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                      <div class="row align-items-center my-3">
                        <div class="col">
                          <strong>Databases</strong>
                          <div class="my-0 text-muted small">Local, DC</div>
                        </div>
                        <div class="col-auto">
                          <strong>+62%</strong>
                        </div>
                        <div class="col-3">
                          <div class="progress" style="height: 4px;">
                            <div class="progress-bar" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div> <!-- .col-md-12 -->
                  </div> <!-- .row -->
                </div> <!-- .card-body -->
              </div> <!-- .card -->
            </div> <!-- .col-md -->
            <div class="col-md-6">
              <div class="card shadow mb-4">
                <div class="card-body">
                  <div class="card-title">
                    <strong>Region</strong>
                    <a class="float-right small text-muted" href="#!">View all</a>
                  </div>
                  <div class="map-box" style="position: relative; width: 350px; min-height: 130px; margin:0 auto;">
                    <div id="dataMapUSA"></div>
                  </div>
                  <div class="row align-items-center h-100 my-2">
                    <div class="col">
                      <p class="mb-0">France</p>
                      <span class="my-0 text-muted small">+10%</span>
                    </div>
                    <div class="col-auto text-right">
                      <span>118</span><br />
                      <div class="progress mt-2" style="height: 4px;">
                        <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                  <div class="row align-items-center my-2">
                    <div class="col">
                      <p class="mb-0">Netherlands</p>
                      <span class="my-0 text-muted small">+0.6%</span>
                    </div>
                    <div class="col-auto text-right">
                      <span>1008</span><br />
                      <div class="progress mt-2" style="height: 4px;">
                        <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                  <div class="row align-items-center my-2">
                    <div class="col">
                      <p class="mb-0">Italy</p>
                      <span class="my-0 text-muted small">+1.6%</span>
                    </div>
                    <div class="col-auto text-right">
                      <span>67</span><br />
                      <div class="progress mt-2" style="height: 4px;">
                        <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                  <div class="row align-items-center my-2">
                    <div class="col">
                      <p class="mb-0">Spain</p>
                      <span class="my-0 text-muted small">+118%</span>
                    </div>
                    <div class="col-auto text-right">
                      <span>186</span><br />
                      <div class="progress mt-2" style="height: 4px;">
                        <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> <!-- .col -->
          </div> <!-- / .row -->
          <div class="row">
            <!-- Recent orders -->
            <div class="col-md-12">
              <h6 class="mb-3">Last orders</h6>
              <table class="table table-borderless table-striped">
                <thead>
                  <tr role="row">
                    <th>ID</th>
                    <th>Purchase Date</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Total</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="col">1331</th>
                    <td>2020-12-26 01:32:21</td>
                    <td>Kasimir Lindsey</td>
                    <td>(697) 486-2101</td>
                    <td>996-3523 Et Ave</td>
                    <td>$3.64</td>
                    <td> Paypal</td>
                    <td>Shipped</td>
                    <td>
                      <div class="dropdown">
                        <button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="#">Edit</a>
                          <a class="dropdown-item" href="#">Remove</a>
                          <a class="dropdown-item" href="#">Assign</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="col">1156</th>
                    <td>2020-04-21 00:38:38</td>
                    <td>Melinda Levy</td>
                    <td>(748) 927-4423</td>
                    <td>Ap #516-8821 Vitae Street</td>
                    <td>$4.18</td>
                    <td> Paypal</td>
                    <td>Pending</td>
                    <td>
                      <div class="dropdown">
                        <button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="#">Edit</a>
                          <a class="dropdown-item" href="#">Remove</a>
                          <a class="dropdown-item" href="#">Assign</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="col">1038</th>
                    <td>2019-06-25 19:13:36</td>
                    <td>Aubrey Sweeney</td>
                    <td>(422) 405-2736</td>
                    <td>Ap #598-7581 Tellus Av.</td>
                    <td>$4.98</td>
                    <td>Credit Card </td>
                    <td>Processing</td>
                    <td>
                      <div class="dropdown">
                        <button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="#">Edit</a>
                          <a class="dropdown-item" href="#">Remove</a>
                          <a class="dropdown-item" href="#">Assign</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="col">1227</th>
                    <td>2021-01-22 13:28:00</td>
                    <td>Timon Bauer</td>
                    <td>(690) 965-1551</td>
                    <td>840-2188 Placerat, Rd.</td>
                    <td>$3.46</td>
                    <td> Paypal</td>
                    <td>Processing</td>
                    <td>
                      <div class="dropdown">
                        <button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="#">Edit</a>
                          <a class="dropdown-item" href="#">Remove</a>
                          <a class="dropdown-item" href="#">Assign</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="col">1956</th>
                    <td>2019-11-11 16:23:17</td>
                    <td>Kelly Barrera</td>
                    <td>(117) 625-6737</td>
                    <td>816 Ornare, Street</td>
                    <td>$4.16</td>
                    <td>Credit Card </td>
                    <td>Shipped</td>
                    <td>
                      <div class="dropdown">
                        <button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="#">Edit</a>
                          <a class="dropdown-item" href="#">Remove</a>
                          <a class="dropdown-item" href="#">Assign</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="col">1669</th>
                    <td>2021-04-12 07:07:13</td>
                    <td>Kellie Roach</td>
                    <td>(422) 748-1761</td>
                    <td>5432 A St.</td>
                    <td>$3.53</td>
                    <td> Paypal</td>
                    <td>Shipped</td>
                    <td>
                      <div class="dropdown">
                        <button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="#">Edit</a>
                          <a class="dropdown-item" href="#">Remove</a>
                          <a class="dropdown-item" href="#">Assign</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="col">1909</th>
                    <td>2020-05-14 00:23:11</td>
                    <td>Lani Diaz</td>
                    <td>(767) 486-2253</td>
                    <td>3328 Ut Street</td>
                    <td>$4.29</td>
                    <td> Paypal</td>
                    <td>Pending</td>
                    <td>
                      <div class="dropdown">
                        <button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="#">Edit</a>
                          <a class="dropdown-item" href="#">Remove</a>
                          <a class="dropdown-item" href="#">Assign</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div> <!-- / .col-md-3 -->
          </div> <!-- end section -->
        </div>
      </div> <!-- .row -->
    </div> <!-- .container-fluid -->
    <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="list-group list-group-flush my-n3">
              <div class="list-group-item bg-transparent">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <span class="fe fe-box fe-24"></span>
                  </div>
                  <div class="col">
                    <small><strong>Package has uploaded successfull</strong></small>
                    <div class="my-0 text-muted small">Package is zipped and uploaded</div>
                    <small class="badge badge-pill badge-light text-muted">1m ago</small>
                  </div>
                </div>
              </div>
              <div class="list-group-item bg-transparent">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <span class="fe fe-download fe-24"></span>
                  </div>
                  <div class="col">
                    <small><strong>Widgets are updated successfull</strong></small>
                    <div class="my-0 text-muted small">Just create new layout Index, form, table</div>
                    <small class="badge badge-pill badge-light text-muted">2m ago</small>
                  </div>
                </div>
              </div>
              <div class="list-group-item bg-transparent">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <span class="fe fe-inbox fe-24"></span>
                  </div>
                  <div class="col">
                    <small><strong>Notifications have been sent</strong></small>
                    <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo</div>
                    <small class="badge badge-pill badge-light text-muted">30m ago</small>
                  </div>
                </div> <!-- / .row -->
              </div>
              <div class="list-group-item bg-transparent">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <span class="fe fe-link fe-24"></span>
                  </div>
                  <div class="col">
                    <small><strong>Link was attached to menu</strong></small>
                    <div class="my-0 text-muted small">New layout has been attached to the menu</div>
                    <small class="badge badge-pill badge-light text-muted">1h ago</small>
                  </div>
                </div>
              </div> <!-- / .row -->
            </div> <!-- / .list-group -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body px-5">
            <div class="row align-items-center">
              <div class="col-6 text-center">
                <div class="squircle bg-success justify-content-center">
                  <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
                </div>
                <p>Control area</p>
              </div>
              <div class="col-6 text-center">
                <div class="squircle bg-primary justify-content-center">
                  <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                </div>
                <p>Activity</p>
              </div>
            </div>
            <div class="row align-items-center">
              <div class="col-6 text-center">
                <div class="squircle bg-primary justify-content-center">
                  <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
                </div>
                <p>Droplet</p>
              </div>
              <div class="col-6 text-center">
                <div class="squircle bg-primary justify-content-center">
                  <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
                </div>
                <p>Upload</p>
              </div>
            </div>
            <div class="row align-items-center">
              <div class="col-6 text-center">
                <div class="squircle bg-primary justify-content-center">
                  <i class="fe fe-users fe-32 align-self-center text-white"></i>
                </div>
                <p>Users</p>
              </div>
              <div class="col-6 text-center">
                <div class="squircle bg-primary justify-content-center">
                  <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                </div>
                <p>Settings</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('js/apexcharts.min.js')); ?>"></script>

<script type="text/javascript">

    // Line Chart
    var lineChart,
    lineChartoptions = {
        series: [
            <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $year->sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    {
                        name: '<?php echo e($section->name); ?>',
                        data: [
                            99
                        ]
                    }
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            // {
            //     name: "Page views",
            //     data: [31, 28, 30, 51, 42, 109, 100, 31, 40, 28, 31, 58, 30, 51, 42, 109, 100, 116]
            // },
            // {
            //     name: "Visitors",
            //     data: [11, 45, 20, 32, 34, 52, 41, 11, 32, 45, 11, 75, 20, 32, 34, 52, 41, 81]
            // },
            // {
            //     name: "Orders",
            //     data: [5, 25, 9, 14, 14, 32, 21, 5, 12, 25, 5, 55, 9, 14, 14, 32, 21, 65]
            // }
        ],
        chart: {
            height: 350,
            type: "line",
            background: !1,
            zoom: { enabled: !1 },
            toolbar: { show: !1 }
        },
        theme: { mode: colors.chartTheme },
        stroke: {
            show: !0,
            curve: "smooth",
            lineCap: "round",
            colors: chartColors,
            width: [3, 2, 3],
            dashArray: [0, 0, 0]
        },
        dataLabels: { enabled: !1 },
        responsive: [
            {
                breakpoint: 480,
                options: { legend: { position: "bottom", offsetX: -10, offsetY: 0 } }
            }
        ],
        markers: {
            size: 4,
            colors: base.primaryColor,
            strokeColors: colors.borderColor,
            strokeWidth: 2,
            strokeOpacity: .9,
            strokeDashArray: 0,
            fillOpacity: 1,
            discrete: [],
            shape: "circle",
            radius: 2,
            offsetX: 0,
            offsetY: 0,
            onClick: void 0,
            onDblClick: void 0,
            showNullDataPoints: !0,
            hover: { size: void 0, sizeOffset: 3 }
        },
        xaxis: {
            type: "text",
            categories: [
                <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    '<?php echo e($year->year); ?>',
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ],
            labels: {
                show: !0,
                trim: !1,
                minHeight: void 0,
                maxHeight: 120,
                style: {
                    colors: colors.mutedColor,
                    cssClass: "text-muted",
                    fontFamily: base.defaultFontFamily
                }
            },
            axisBorder: { show: !1 }
        },
        yaxis: {
            labels: {
                show: !0,
                trim: !1,
                offsetX: -10,
                minHeight: void 0,
                maxHeight: 120,
                style: {
                    colors: colors.mutedColor,
                    cssClass: "text-muted",
                    fontFamily: base.defaultFontFamily
                }
            }
        },
        legend: {
            position: "top",
            fontFamily: base.defaultFontFamily,
            fontWeight: 400,
            labels: {
                colors: colors.mutedColor,
                useSeriesColors: !1
            },
            markers: {
                width: 10,
                height: 10,
                strokeWidth: 0,
                strokeColor: colors.borderColor,
                fillColors: chartColors,
                radius: 6,
                customHTML: void 0,
                onClick: void 0,
                offsetX: 0,
                offsetY: 0
            },
            itemMargin: { horizontal: 10, vertical: 0 },
            onItemClick: { toggleDataSeries: !0 },
            onItemHover: { highlightDataSeries: !0 }
        },
        grid: {
            show: !0,
            borderColor: colors.borderColor,
            strokeDashArray: 0,
            position: "back",
            xaxis: { lines: { show: !1 } },
            yaxis: { lines: { show: !0 } },
            row: { colors: void 0, opacity: .5 },
            column: { colors: void 0, opacity: .5 },
            padding: { top: 0, right: 0, bottom: 0, left: 0 }
        }
    },
    lineChartCtn = document.querySelector("#lineChart");
lineChartCtn && (lineChart = new ApexCharts(lineChartCtn, lineChartoptions)).render();

</script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/altayeb/Desktop/university/resources/views/dashboard.blade.php ENDPATH**/ ?>