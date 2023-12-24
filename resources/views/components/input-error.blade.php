@props(['messages'])

@if ($messages)
    {{-- <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1']) }}> --}}
    <ul {{ $attributes->merge(['class' => '']) }}
        style="margin-top: 0.25rem; font-size: 0.875rem; line-height: 1.25rem; color: #DC2626;">
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
