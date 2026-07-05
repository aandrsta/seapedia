@props(['status'])

@php
    $class = '';
    $label = '';
    switch ($status) {
        case 'sedang_dikemas':
            $class = 'status-sedang-dikemas';
            $label = 'Sedang Dikemas';
            break;
        case 'menunggu_pengirim':
            $class = 'status-menunggu-pengirim';
            $label = 'Menunggu Pengirim';
            break;
        case 'sedang_dikirim':
            $class = 'status-sedang-dikirim';
            $label = 'Sedang Dikirim';
            break;
        case 'pesanan_selesai':
            $class = 'status-pesanan-selesai';
            $label = 'Pesanan Selesai';
            break;
        case 'dikembalikan':
            $class = 'status-dikembalikan';
            $label = 'Dikembalikan';
            break;
        default:
            $class = 'badge-navy';
            $label = ucfirst($status);
    }
@endphp

<span class="{{ $class }}">
    {{ $label }}
</span>
