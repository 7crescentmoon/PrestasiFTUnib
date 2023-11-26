<div class="paginate d-flex justify-content-between align-items-center mt-2">
    @if ($datas->count() == 0)
        <p class="text-black text-decoration-underline">Menampilkan <strong>0</strong> hingga
            <strong>0 </strong> dari <strong>{{ $datas->total() }}</strong> data <strong>(filter dari
                {{ $counters }}) data</strong>
        </p>
        {{ $datas->links() }}
    @else
        <p class="text-black text-decoration-underline">Menampilkan <strong>{{ $datas->firstItem() }}</strong> hingga
            <strong>{{ $datas->lastItem() }}</strong> dari <strong>{{ $datas->total() }}</strong> data
        </p>
        {{ $datas->links() }}
    @endif
</div>
