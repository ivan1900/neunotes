<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?= $langMap['usuarios']?></h2>
    </div>
    <div class="col-lg-2">
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5><?= $langMap['lista']?></h5>
                    <div class="ibox-tools">
                        <a href="<?=base_url() . '/' . 'UsersAdmin' ?>"
                            class="btn btn-primary btn-xs"><?= $langMap['viewAdmin'] ?></a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div id="app">
                     <!--   <v-client-table :columns="$store.state.userTable.columns" :data="$store.state.userTable.data" :options="$store.state.userTable.options">
                           
                        </v-client-table> -->
                        <vuetableusers></vuetableusers> 
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>