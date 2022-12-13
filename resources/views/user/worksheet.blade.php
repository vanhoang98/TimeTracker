<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Timesheet</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css")}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/dist/css/adminlte.min.css")}}">

    <link rel="stylesheet" href="{{asset("/fullcalendar/main.css")}}">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

    <!-- Header -->
    @include('user.layouts.header_alter')

    {{--        <!-- Main Sidebar Container -->--}}
    {{--        @include('user.layouts.sidebar_alter')--}}

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        {{--        <!-- Content Header (Page header) -->--}}
        {{--        <div class="content-header">--}}
        {{--            <div class="container-fluid">--}}
        {{--                <div class="row mb-2">--}}
        {{--                    <div class="col-sm-6">--}}
        {{--                        <h1 class="m-0">Starter Page</h1>--}}
        {{--                    </div><!-- /.col -->--}}
        {{--                    <div class="col-sm-6">--}}
        {{--                        <ol class="breadcrumb float-sm-right">--}}
        {{--                            <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
        {{--                            <li class="breadcrumb-item active">Starter Page</li>--}}
        {{--                        </ol>--}}
        {{--                    </div><!-- /.col -->--}}
        {{--                </div><!-- /.row -->--}}
        {{--            </div><!-- /.container-fluid -->--}}
        {{--        </div>--}}
        {{--        <!-- /.content-header -->--}}

        <!-- Main content -->
        <div class="content" style="height: 100vh">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 sidebar-light-primary">
                        <div class="card card-primary card-outline" style="height: 30vh">
                            <div class="card-header">
                                <h3 class="card-title">MyWorkItem</h3>
                                <div class="card-tools">
                                    <!-- Collapse Button -->
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i></button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <div class="card-body overflow-auto">
                                <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column"
                                    data-widget="treeview" role="menu" data-accordion="false">
                                    @foreach($interestedTask as $task)
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                <i class="fas fa-file"></i>
                                                {{--                                                <i class="fal fa-file nav-icon"></i>--}}
                                                <p>{{$task->name}} [{{$task->project_id}}]</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="card card-primary card-outline" style="height: 70vh">
                            <div class="card-header">
                                <h3 class="card-title">WorkItemTree</h3>
                                <div class="card-tools">
                                    <!-- Collapse Button -->
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i></button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <div class="card-body overflow-auto">
                                <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column"
                                    data-widget="treeview" role="menu" data-accordion="false">
                                    @foreach($taskTree as $project)
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                <i class="fas fa-folder"></i>
                                                <p>[{{$project->id}}] {{$project->name}}</p>
                                                <i class="right fas fa-angle-left"></i>
                                            </div>
                                            <ul class="nav nav-treeview">
                                                @foreach($project->tasks as $childTask)
                                                    <li class="nav-item">
                                                        @include('user.layouts.childtask', ['child_task' => $childTask])
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div><!-- /.card -->
                    </div>
                    <!-- /.col-md-6 -->
                    <div class="col-md-9" >
                        <div class="card card-primary>
                            <div class="card-body p-0" >
                                <div id="calendar">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    @include('user.layouts.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset("/bower_components/admin-lte/plugins/jquery/jquery.min.js")}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset("/bower_components/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{asset("/bower_components/admin-lte/dist/js/adminlte.min.js")}}"></script>

<script src="{{asset("/fullcalendar/main.js")}}"></script>

<script src="{{ asset('js/fullcalendar.js') }}"></script>
</body>
</html>
