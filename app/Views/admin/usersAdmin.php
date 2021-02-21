<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?= $langMap['usersAdmin']?></h2>
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
                </div>
                <div  class="ibox-content">
                    <div id="app2" class="table-responsive">
                    <label>Usuario</label>
                    <input type="text" class="form-control" v-model="user">
                    <label>Nombre</label>
                    <input type="text" class="form-control" v-model="name">
                    <button class="btn btn-info mt-2" @click="addUser">Add User</button>
                            
                        <table id="users-table" class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th><?= $langMap['user']?></th>
                                    <th><?= $langMap['name']?></th>
                                    <th><?= $langMap['position']?></th>
                                    <th><?= $langMap['activo']?></th>
                                    <th><?= $langMap['options']?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!is_null($usersList)): ?>
                                <?php foreach ($usersList as $item): ?>
                                <tr class="gradeX">
                                    <td><?= $item->name?></td>
                                    <td><?= $item->user?></td>
                                    <td><?= $item->position?></td>
                                    <td class="center"><?= "si" ?></td>
                                    <td class="center"></td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                            <tfoot>
                                <th><?= $langMap['user']?></th>
                                <th><?= $langMap['name']?></th>
                                <th><?= $langMap['position']?></th>
                                <th><?= $langMap['activo']?></th>
                                <th><?= $langMap['options']?></th>
                            </tfoot>
                        </table>
                    </div>

                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5><?= $langMap['lista']?></h5> 
                        </div>
                        <div class="ibox-content">
                            <div id="app">
                                <v-client-table :columns="columns" :data="data" :options="options">
                                    <a slot="email" slot-scope="props" :href="`mailto:${props.row.email}`">
                                        {{props.row.email}}
                                    </a>
                                </v-client-table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>