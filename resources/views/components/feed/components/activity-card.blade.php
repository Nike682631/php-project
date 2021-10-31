<div>
    <!-- He who is contented is rich. - Laozi -->
    <div class="card card__activity-card">
        <div class="card__activity-card card-header">
            <div class="card_date text-small">
                {{ $item->created_at }}
            </div>
            <div class='company_name'>
                {{-- Causer is always user object --}}
                {{ $item }}
            </div>
            @if ($item->subject_type === 'App\Product')
                <x-product-card :item="$item->subject"></x-product-card>
            @endif

            @if ($item->subject_type === 'App\Post')
                <x-post-card :item="$item->subject"></x-post-card>
            @endif


            <livewire:feed.activity-comments/>


        </div>
    </div>

</div>
