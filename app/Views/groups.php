<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?= $langMap['grupos']?></h2>
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
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th><?= $langMap['id']?></th>
                                    <th><?= $langMap['nombre']?></th>
                                    <th><?= $langMap['menufrontend']?></th>
                                    <th><?= $langMap['menubackend']?></th>
                                    <th><?= $langMap['caso']?></th>
                                    <th><?= $langMap['opciones']?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!is_null($groupsList)): ?>
                                <?php foreach ($groupsList as $item): ?>
                                <tr class="gradeX">
                                    <td><?= $item->id()?></td>
                                    <td><?= $item->name()?></td>
                                    <td><?= $item->menufront()?></td>
                                    <td class="center"><?= $item->menubackend()?></td>
                                    <td><?= $item->casesid()?></td>
                                    <td class="center">
                                        <div class="btn-group">
                                            <button class="btn btn-primary" type="button">Eliminar</button>
                                            <a target="_self" href="<?php echo base_url() ?>/GroupEdit/index/<?= $item->id()?>" class="btn btn-white">Mostrar</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                            <tfoot>
                                <th><?= $langMap['id']?></th>
                                <th><?= $langMap['nombre']?></th>
                                <th><?= $langMap['menufrontend']?></th>
                                <th><?= $langMap['menubackend']?></th>
                                <th><?= $langMap['caso']?></th>
                                <th><?= $langMap['opciones']?></th>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>