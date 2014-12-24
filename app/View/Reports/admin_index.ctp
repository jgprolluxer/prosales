<!-- Reports Header -->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="fa fa-table"></i><?php echo __('ADMIN_REPORT_INDEX_HEAD_TITLE'); ?><br><small><?php echo __('ADMIN_REPORT_INDEX_HEAD_TITLE_SMALL'); ?></small>
        </h1>
    </div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <?php echo $this->Navigation->printBacklinks($trail, 10); ?>
</ul>
<!-- END Reports Header -->
<!-- Interactive Block -->
<div class="block">
    <!-- Interactive Title -->
    <div class="block-title">
        <!-- Interactive block controls (initialized in js/app.js -> interactiveBlocks()) -->
        <div class="block-options pull-right">
            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-content"><i class="fa fa-arrows-v"></i></a>
            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen"><i class="fa fa-desktop"></i></a>
        </div>
        <h2><strong>Interactive</strong> Block</h2>
    </div>
    <!-- END Interactive Title -->

    <!-- Interactive Content -->
    <!-- The content you will put inside div.block-content, will be toggled -->
    <div class="block-content">
        <section data-ng-controller="adminIndexReportsController">
            <div class="table-responsive">
                <table class="table" datatable="ng" dt-options="dtOptions" dt-column-defs="dtColumnDefs" >
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>CreatedBy</th>
                        <th>UpdatedBy</th>
                        <th>Title</th>
                        <th>RKey</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Model</th>
                        <th>FindType</th>
                        <th>Recursive</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="report in reports">
                        <td>{{report.Report.id}}</td>
                        <td>{{report.Report.created}}</td>
                        <td>{{report.Report.updated}}</td>
                        <td>{{report.Report.created_by}}</td>
                        <td>{{report.Report.updated_by}}</td>
                        <td>{{report.Report.title}}</td>
                        <td>{{report.Report.rkey}}</td>
                        <td>{{report.Report.type}}</td>
                        <td>{{report.Report.status}}</td>
                        <td>{{report.Report.modelName}}</td>
                        <td>{{report.Report.findType}}</td>
                        <td>{{report.Report.recursive}}</td>
                        <td><a href="" class="btn btn-warning btn-xs"><i class="gi gi-pencil"></i></a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </section>

    </div>
    <p class="text-muted">You can also have content that ignores toggling..</p>
    <!-- END Interactive Content -->
</div>
<!-- END Interactive Block -->