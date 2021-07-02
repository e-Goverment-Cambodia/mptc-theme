@php
    $primary = get_theme_mod( 'theme_color_setting' ) ?: '#0956AE';
    $secondary = get_theme_mod( 'theme_color_secondary_setting' ) ?: '#0956AE';
    $font = get_theme_mod( 'khmer_font_setting' ) ?: 'Koh-Santepheap';
@endphp

<style>
    :root {
        --bs-blue: #0d6efd;
        --bs-indigo: #6610f2;
        --bs-purple: #6f42c1;
        --bs-pink: #d63384;
        --bs-red: #dc3545;
        --bs-orange: #fd7e14;
        --bs-yellow: #ffc107;
        --bs-green: #198754;
        --bs-teal: #20c997;
        --bs-cyan: #0dcaf0;
        --bs-white: #fff;
        --bs-gray: #6c757d;
        --bs-gray-dark: #343a40;
        --bs-primary: {!! $primary !!};
        --bs-secondary: {!! $secondary !!};
        --bs-success: #198754;
        --bs-info: #0dcaf0;
        --bs-warning: #ffc107;
        --bs-danger: #dc3545;
        --bs-light: #f8f9fa;
        --bs-dark: #212529;
        --bs-font-sans-serif: "Open Sans", Helvetica, "{!! $font !!}", sans-serif;
        --bs-font-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        --bs-gradient: linear-gradient(45deg, {!! $primary !!}b5, {!! $primary !!});
    }
</style>