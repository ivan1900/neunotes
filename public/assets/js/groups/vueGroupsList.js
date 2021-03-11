var vuegroupslist=({
    template: /*html*/`
    <div>
    <div class="m-b-lg">

        <div class="input-group input-group-sm">
            <input type="text" class="form-control" placeholder="Search issue by name..." >
            <div class="input-group-append">
                <button class="btn btn-white" type="button">Search</button>
            </div>
        </div>

        <div class="m-t-md">

            <div class="float-right">
                <button type="button" class="btn btn-sm btn-white"> <i class="fa fa-comments"></i> </button>
                <button type="button" class="btn btn-sm btn-white"> <i class="fa fa-user"></i> </button>
                <button type="button" class="btn btn-sm btn-white"> <i class="fa fa-list"></i> </button>
                <button type="button" class="btn btn-sm btn-white"> <i class="fa fa-pencil"></i> </button>
                <button type="button" class="btn btn-sm btn-white"> <i class="fa fa-print"></i> </button>
                <button type="button" class="btn btn-sm btn-white"> <i class="fa fa-cogs"></i> </button>
            </div>

            <strong>Found 61 issues.</strong>



        </div>

    </div>

    <div class="table-responsive">
    <table class="table table-hover issue-tracker">
    <tbody>
    <tr>
        <td>
            <span class="label label-primary">Added</span>
        </td>
        <td class="issue-info">
            <a href="#">
                ISSUE-23
            </a>

            <small>
                This is issue with the coresponding note
            </small>
        </td>
        <td>
            Adrian Novak
        </td>
        <td>
            12.02.2015 10:00 am
        </td>
        <td>
            <span class="pie">0.52,1.041</span>
            2d
        </td>
        <td class="text-right">
            <button class="btn btn-white btn-xs"> Tag</button>
            <button class="btn btn-white btn-xs"> Mag</button>
            <button class="btn btn-white btn-xs"> Rag</button>
        </td>
    </tr>
    </tbody>
    </table>
    </div>
    </div>
    `,
    methods: {
    },
})