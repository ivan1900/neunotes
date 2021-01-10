<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?= $langMap['casos']?></h2>
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
                    <div class="float-right">
                        <a target="_self" href="<?php echo base_url() ?>/UsesCaseCreate" class="btn btn-primary btn-sm"><?= $langMap['nuevo'] ?></a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th><?= $langMap['id']?></th>
                                    <th><?= $langMap['nombre']?></th>
                                    <th><?= $langMap['tabla']?></th>
                                    <th><?= $langMap['activo']?></th>
                                    <th><?= $langMap['opciones']?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!is_null($usesCase)): ?>
                                <?php foreach ($usesCase as $item): ?>
                                <tr class="gradeX">
                                    <td><?= $item->id()?></td>
                                    <td><?= $item->nombre()?></td>
                                    <td><?= $item->tabla()?></td>
                                    <td class="center"><?= $item->activo()?></td>
                                    <td class="center"></td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                            <tfoot>
                                <th><?= $langMap['id']?></th>
                                <th><?= $langMap['nombre']?></th>
                                <th><?= $langMap['tabla']?></th>
                                <th><?= $langMap['activo']?></th>
                                <th><?= $langMap['opciones']?></th>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>