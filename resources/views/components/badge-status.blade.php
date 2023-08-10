@props(['status' => false])

<div @class(['badge', 'bg-green-500' => $status, 'bg-red-500' => !$status])>
    <i @class([
        'fa-solid text-white',
        'fa-check' => $status,
        'fa-times' => !$status,
    ])></i>
</div>
