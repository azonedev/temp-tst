<x-mail::message>
    Dear {{ $user->name }},

    We are pleased to inform you that your vaccination has been scheduled.

    NID: {{ $user->nid }}
    Vaccine Center: {{ $center->name }}
    Location: {{ $center->location }}
    Scheduled Date: {{ $scheduledDate->format('F j, Y') }}

    Please ensure you arrive on time at the vaccine center on your scheduled date. If you have any questions, feel free to reach out.

    Thanks for doing your part in keeping everyone safe!

    Best regards,
    {{ config('app.name') }}
</x-mail::message>
