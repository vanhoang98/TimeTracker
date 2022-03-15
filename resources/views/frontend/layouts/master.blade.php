<!DOCTYPE html>
<html lang="en">

<head>
    <title>TimeSheet</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta property="og:type" content="website">

    <link rel="stylesheet" media="all" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" media="all" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" media="all" href="{{ asset('css/timesheet_items.css') }}">
    <link rel="stylesheet" media="all" href="{{ asset('css/fullcalendar.css') }}">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/gif" sizes="20x20">

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5/main.min.js"></script>
    {{-- <script src="{{ asset('js/timesheet.js') }}"></script> --}}
    <script src="{{ asset('js/fullcalendar.js') }}"></script>
    <script src="{{ asset('js/timesheet_page.js') }}"></script>

    {{-- Need to replace this script --}}
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdn.jsdelivr.net/combine/npm/fullcalendar@5.10.1,npm/fullcalendar-scheduler@5.10.1,npm/fullcalendar@5.10.1/locales-all.min.js,npm/fullcalendar@5.10.1/locales-all.min.js,npm/fullcalendar@5.10.1/main.min.js,npm/fullcalendar@5.10.2"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/combine/npm/fullcalendar@5.10.1/main.min.css,npm/fullcalendar@5.10.1/main.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>
    @include('frontend.layouts.header')

    @include('frontend.pages.timesheet', ['task_tree' => $taskTree, 'interested_tasks' => $interestedTask])
</body>

</html>
