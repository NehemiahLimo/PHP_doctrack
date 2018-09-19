<?php require_once('../inc/header_user.php');?>
<?php require_once('../inc/sidebar_user.php');?>
            <!-- Header Ends -->


            <!-- Page Content Start -->
            <!-- ================== -->

            <div class="wraper container-fluid">
                <div class="page-title"> 
                    <h3 class="title">Inbox</h3> 
                </div>
                  
                <div class="row">
                    
                    <!-- Left sidebar -->
                    <div class="col-md-3">
                         <a href="email-compose.html" class="btn btn-purple btn-block">Compose</a>
                        <div class="panel panel-default p-0  m-t-20">
                            <div class="panel-body p-0">
                                <div class="list-group no-border mail-list">
                                  <a href="#" class="list-group-item active"><i class="fa fa-download m-r-5"></i>Inbox <b>(8)</b></a>
                                  <a href="#" class="list-group-item"><i class="fa fa-paper-plane-o m-r-5"></i>Sent Mail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Left sidebar -->
                    

                    <!-- Right Sidebar -->
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="btn-toolbar" role="toolbar">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success"><i class="fa fa-inbox"></i></button>
                                        <button type="button" class="btn btn-success"><i class="fa fa-exclamation-circle"></i></button>
                                        <button type="button" class="btn btn-success"><i class="fa fa-trash-o"></i></button>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-folder"></i>
                                        <b class="caret"></b>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#fakelink">Action</a></li>
                                            <li><a href="#fakelink">Another action</a></li>
                                            <li><a href="#fakelink">Something else here</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#fakelink">Separated link</a></li>
                                        </ul>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-tag"></i>
                                        <b class="caret"></b>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#fakelink">Action</a></li>
                                            <li><a href="#fakelink">Another action</a></li>
                                            <li><a href="#fakelink">Something else here</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#fakelink">Separated link</a></li>
                                        </ul>
                                    </div>
                                    
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                          More
                                          <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                          <li><a href="#fakelink">Dropdown link</a></li>
                                          <li><a href="#fakelink">Dropdown link</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- End row -->
                        
                        <div class="panel panel-default m-t-20">
                            <div class="panel-body">
                            
                                <table class="table table-hover mails">
                                    <tbody>
                                        <tr>
                                            <td class="mail-select">
                                                <label class="cr-styled">
                                                    <input type="checkbox"><i class="fa"></i>
                                                </label>
                                            </td>
                                            <td class="mail-rateing">
                                                <i class="fa fa-star"></i>
                                            </td>
                                            <td>
                                                <a href="email-read.html">Google Inc</a>
                                            </td>
                                            <td>
                                                <a href="email-read.html"><i class="fa fa-circle text-info m-r-15"></i>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a>
                                            </td>
                                            <td>
                                                <i class="fa fa-paperclip"></i>
                                            </td>
                                            <td class="text-right">
                                                07:23 AM
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="mail-select">
                                                <label class="cr-styled">
                                                    <input type="checkbox"><i class="fa"></i>
                                                </label>
                                            </td>
                                            <td class="mail-rateing">
                                                <i class="fa fa-star text-warning"></i>
                                            </td>
                                            <td>
                                                <a href="email-read.html">John Deo</a>
                                            </td>
                                            <td>
                                                <a href="email-read.html"><i class="fa fa-circle text-success m-r-15"></i>Hi Bro, How are you?</a>
                                            </td>
                                            <td>
                                                
                                            </td>
                                            <td class="text-right">
                                                07:03 AM
                                            </td>
                                        </tr>

                                        <tr class="active">
                                            <td class="mail-select">
                                                <label class="cr-styled">
                                                    <input type="checkbox"><i class="fa"></i>
                                                </label>
                                            </td>
                                            <td class="mail-rateing">
                                                <i class="fa fa-star"></i>
                                            </td>
                                            <td>
                                                <a href="email-read.html">Manager</a>
                                            </td>
                                            <td>
                                                <a href="email-read.html"><i class="fa fa-circle text-purple m-r-15"></i>Dolor sit amet, consectetuer adipiscing</a>
                                            </td>
                                            <td>
                                                <i class="fa fa-paperclip"></i>
                                            </td>
                                            <td class="text-right">
                                                03:00 AM
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="mail-select">
                                                <label class="cr-styled">
                                                    <input type="checkbox"><i class="fa"></i>
                                                </label>
                                            </td>
                                            <td class="mail-rateing">
                                                <i class="fa fa-star text-warning"></i>
                                            </td>
                                            <td>
                                                <a href="email-read.html">Manager</a>
                                            </td>
                                            <td>
                                                <a href="email-read.html"><i class="fa fa-circle text-warning m-r-15"></i>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a>
                                            </td>
                                            <td>
                                                <i class="fa fa-paperclip"></i>
                                            </td>
                                            <td class="text-right">
                                                22 Feb
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="mail-select">
                                                <label class="cr-styled">
                                                    <input type="checkbox"><i class="fa"></i>
                                                </label>
                                            </td>
                                            <td class="mail-rateing">
                                                <i class="fa fa-star text-warning"></i>
                                            </td>
                                            <td>
                                                <a href="email-read.html">Facebook</a>
                                            </td>
                                            <td>
                                                <a href="email-read.html">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a>
                                            </td>
                                            <td>
                                                
                                            </td>
                                            <td class="text-right">
                                                22 Feb
                                            </td>
                                        </tr>

                                        <tr class="active">
                                            <td class="mail-select">
                                                <label class="cr-styled">
                                                    <input type="checkbox"><i class="fa"></i>
                                                </label>
                                            </td>
                                            <td class="mail-rateing">
                                                <i class="fa fa-star text-warning"></i>
                                            </td>
                                            <td>
                                                <a href="email-read.html">Google Inc</a>
                                            </td>
                                            <td>
                                                <a href="email-read.html">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a>
                                            </td>
                                            <td>
                                                
                                            </td>
                                            <td class="text-right">
                                                21 Feb
                                            </td>
                                        </tr>

                                        <tr class="active">
                                            <td class="mail-select">
                                                <label class="cr-styled">
                                                    <input type="checkbox"><i class="fa"></i>
                                                </label>
                                            </td>
                                            <td class="mail-rateing">
                                                <i class="fa fa-star"></i>
                                            </td>
                                            <td>
                                                <a href="email-read.html">Twitter Inc</a>
                                            </td>
                                            <td>
                                                <a href="email-read.html"><i class="fa fa-circle text-info m-r-15"></i>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a>
                                            </td>
                                            <td>
                                                <i class="fa fa-paperclip"></i>
                                            </td>
                                            <td class="text-right">
                                                21 Feb
                                            </td>
                                        </tr>

                                        <tr class="active">
                                            <td class="mail-select">
                                                <label class="cr-styled">
                                                    <input type="checkbox"><i class="fa"></i>
                                                </label>
                                            </td>
                                            <td class="mail-rateing">
                                                <i class="fa fa-star"></i>
                                            </td>
                                            <td>
                                                <a href="email-read.html">Jonaly Smith</a>
                                            </td>
                                            <td>
                                                <a href="email-read.html"><i class="fa fa-circle text-pink m-r-15"></i>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a>
                                            </td>
                                            <td>
                                                <i class="fa fa-paperclip"></i>
                                            </td>
                                            <td class="text-right">
                                                19 Feb
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                                <hr>
                                
                                <div class="row">
                                    <div class="col-xs-7">
                                        Showing 1 - 20 of 289
                                    </div>
                                    <div class="col-xs-5">
                                        <div class="btn-group pull-right">
                                          <button type="button" class="btn btn-default"><i class="fa fa-chevron-left"></i></button>
                                          <button type="button" class="btn btn-default"><i class="fa fa-chevron-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            
                            </div> <!-- panel body -->
                        </div> <!-- panel -->
                    </div> <!-- end Col-9 -->
                
                </div><!-- End row -->


            </div> <!-- END Wraper -->

        <?php require_once('../inc/footer_user.php');?>