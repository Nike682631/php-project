<div class = "company-actions">
    <a class = "btn btn-secondary" href = "{{ route('message.read', 1) }}">
        {{ "Messages (" . $company->unreadCount() . ")" }}
    </a>
    <a class = "btn btn-secondary" href = "{{ route('matching.index') }}">
        {{ "Matches (" . $company->matchesCount() . ")" }}
    </a>
    <a class = "btn btn-secondary" href = "{{ route('logistics.index') }}">
        {{ "Logistics Requests (" . App\LogisticsRequest::activeRequests() . ")" }}
    </a>
</div>