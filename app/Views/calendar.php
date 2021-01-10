<div id="page-wrapper" class="gray-bg">
<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <span class="m-r-sm text-muted welcome-message">Welcome to INSPINIA+ Admin Theme.</span>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                    <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                </a>
                <ul class="dropdown-menu dropdown-messages">
                    <li>
                        <div class="dropdown-messages-box">
                            <a class="dropdown-item float-left" href="profile.html">
                                <img alt="image" class="rounded-circle" src="img/a7.jpg">
                            </a>
                            <div class="media-body">
                                <small class="float-right">46h ago</small>
                                <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li>
                        <div class="dropdown-messages-box">
                            <a class="dropdown-item float-left" href="profile.html">
                                <img alt="image" class="rounded-circle" src="img/a4.jpg">
                            </a>
                            <div class="media-body ">
                                <small class="float-right text-navy">5h ago</small>
                                <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li>
                        <div class="dropdown-messages-box">
                            <a class="dropdown-item float-left" href="profile.html">
                                <img alt="image" class="rounded-circle" src="img/profile.jpg">
                            </a>
                            <div class="media-body ">
                                <small class="float-right">23h ago</small>
                                <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li>
                        <div class="text-center link-block">
                            <a href="mailbox.html" class="dropdown-item">
                                <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="mailbox.html">
                            <div>
                                <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                <span class="float-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li>
                        <a href="profile.html">
                            <div>
                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                <span class="float-right text-muted small">12 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li>
                        <a href="grid_options.html">
                            <div>
                                <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                <span class="float-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li>
                        <div class="text-center link-block">
                            <a href="notifications.html">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>


            <li>
                <a href="login.html">
                    <i class="fa fa-sign-out"></i> Log out
                </a>
            </li>
        </ul>

    </nav>
</div>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Calendar</h2>
        <ol class="breadcrumb">
            
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row animated fadeInDown">
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Tipos de Cita</h5>
                </div>
                <div id="appAppointmentTypes" class="ibox-content">
                    <div id='external-events'>
                        <p>Arrastra tipos de cita al calendario </p>
                        <?php foreach ($appointmentTypes as $item): ?>
                            <div class='external-event navy-bg'><?= $item->title; ?></div>
                        <?php endforeach; ?>
                       <!-- <p class="m-t">
                            <input type='checkbox' id='drop-remove' class="i-checks" checked /> <label for='drop-remove'>remove after drop</label>
                        </p>
                        -->
                    </div>
                </div>
            </div>
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Añadir Cita </h5> 
                </div>
                <div class="ibox-content" id="appAddApointments">   
                    <div class="alert alert-success" v-if="successMSG" @click="successMSG = false">
                        {{successMSG}}
                    </div>
                    <form>
                        <label>Asunto</label>
                        <input class="form-control" placeholder="" name="asunto" id="asunto" type="text" v-model="newAppointment.title" required autofocus> 
                        <label>Comienzo</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" class="form-control" name="startDate" type="date" min="2020-04-18" step="1" >
                        </div>
                        <div class="input-group clockpicker" data-autoclose="true">
                                <span class="input-group-addon">
                                    <span class="fa fa-clock-o"></span>
                                </span>
                                <input type="text" class="form-control" v-model="newAppointment.startTime" >
                        </div>
                        <label>Fin</label>
                        <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" class="form-control" name="startDate" type="text" min="" step="1" v-model="newAppointment.endDate">
                        </div>
                        <div class="input-group clockpicker" data-autoclose="true">
                                <span class="input-group-addon">
                                    <span class="fa fa-clock-o"></span>
                                </span>
                                <input type="text" class="form-control" v-model="newAppointment.endTime" >
                        </div>
                        <div class="form-group">
                            <label class="font-normal">Cliente</label>
                            <div>
                                <select v-model="successMSG" data-placeholder="" class="form-control"  v-on:keydown="searchCustomer()" tabindex="2">
                                <option value="">Select</option>
                                <option value="United States">United States</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="font-normal">Usuario</label>
                            <div>
                                <select data-placeholder="" class="select2_user"  tabindex="2">
                                <option value="">Select</option>
                                <option v-for="item in usersList" :value="item.id">{{item.name}}</option>
                                </select>
                            </div>
                        </div>
                        <label>Descripción</label>
                        <input class="form-control" placeholder="" name="descripcion" id="descripcion" type="text" value="">
                        <div class="hr-line-dashed"></div>
                                <div class="form-group row">
                                    <div class="">
                                        <button class="btn btn-white btn-sm" type="submit">Limpiar</button>
                                        <button class="btn btn-primary btn-sm" type="submit">Añadir</button>
                                    </div>
                                </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Citas</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#" class="dropdown-item">Config option 1</a>
                            </li>
                            <li><a href="#" class="dropdown-item">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <div class="float-right">
        10GB of <strong>250GB</strong> Free.
    </div>
    <div>
        <strong>Copyright</strong> Example Company &copy; 2014-2018
    </div>
</div>
</div>