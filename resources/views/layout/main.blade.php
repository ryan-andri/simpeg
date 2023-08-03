<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.common.header')
</head>

<body id="page-top">
    @include('layout.common.navbar')
    @yield('content')
    @include('layout.common.footer')
</body>

</html>