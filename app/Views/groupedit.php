<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?= $langMap['grupo']?></h2>
    </div>
    <div class="col-lg-2">
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div id="vgroups" class="ibox ">
                <div class="ibox-title">
                    <h5><?= $langMap['grupo'] .': '. $group[0]->name()  ?></h5>
                </div>
                <div class="ibox-content">
                    <input type="hidden" id="groupId" name="groupId" value="<?= $groupId ?>">
                    <div class="row">
                        <div class="col-lg-4 form-group">
                            <label class="font-normal"><?= $langMap['usuariosdisp']?></label>
                            <div class="m-l-n">
                                <select class="form-control" multiple="" size="20">
                                    <option v-for="item in usersavailables"
                                        v-on:click.prevent="selectAvailable(item.idusuario)">{{item.nombre}}</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 mt-lg-4">
                            <div class="row justify-content-center">
                                <div class="row justify-content-center mt-1">
                                    <button type="button" class="btn btn-default fa fa-arrow-left"
                                        v-on:click.prevent="removeFromGroup()"></button>
                                </div>
                            </div>
                            <div class="row justify-content-center mt-1">
                                <button type="button" class="btn btn-default fa fa-arrow-right"
                                    v-on:click.prevent="moveToGroup()"></button>
                            </div>
                        </div>
                        <div class="col-lg-4 form-group">
                            <label class="font-normal"><?= $langMap['usuariossel']?></label>
                            <div class="m-l-n">
                                <select class="form-control" multiple="" size="20">
                                    <option v-for="item in usersselected"
                                        v-on:click.prevent="selectInGroup(item.idusuario)">{{item.nombre}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5><?= $langMap['caso'] ?><h5>
                </div>
                <div id="vusecase" class="ibox-content">
                    <div class="form-grup row">
                        <label class="col-lg-3"><?= $langMap['seleccionacaso'] ?></label>
                        <div class="col-lg-3"><select class="form-control m-b" name="usecase">
                                <option>option 1</option>
                                <option>option 2</option>
                                <option>option 3</option>
                                <option>option 4</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>