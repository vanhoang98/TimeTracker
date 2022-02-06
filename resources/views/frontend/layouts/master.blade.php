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

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5/main.min.js"></script>
    <script src="{{ asset('js/timesheet.js') }}"></script>

</head>

<body>
    @include('frontend.layouts.header')

    @include('frontend.pages.timesheet')
</body>

</html>
