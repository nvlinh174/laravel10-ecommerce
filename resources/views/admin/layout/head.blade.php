<head>
    @php
        $actionName = request()
            ->route()
            ->getActionName();
        $controllerAction = class_basename($actionName);
        $arr = explode('@', $controllerAction);
    @endphp
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin - {{ $arr[0] }} - {{ $arr[1] }}</title>
    <!-- CSS files -->
    <link href="{{ asset('admin/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    {{-- Stack Libs CSS --}}
    @stack('libs_css')
    {{-- Custom CSS --}}
    <link href="{{ asset('admin/css/myStyle.css') }}" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>
