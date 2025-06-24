<x-filament::card>
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-lg font-bold">Pengaduan Terbaru</h2>
    </div>

    <ul class="space-y-4">
        @foreach ($this->pengaduan() as $item)
            <li class="p-4 border rounded-md shadow-sm bg-white dark:bg-gray-900">
                <div class="flex justify-between items-start">
                    <div>
                        <div class="font-semibold text-sm text-gray-800 dark:text-gray-100">
                            {{ $item->nama ?? 'Anonim' }}
                        </div>
                        <div class="text-sm text-gray-600 dark:text-gray-300 mt-1">
                            {{ \Illuminate\Support\Str::limit($item->keterangan, 120) }}
                        </div>
                        <div class="text-xs text-gray-500 mt-1">
                            {{ $item->created_at?->diffForHumans() ?? '-' }}
                        </div>
                    </div>
                </div>

                <form action="{{ route('pengaduan.updateStatus', $item->id) }}" method="POST" class="flex flex-wrap items-center gap-2 mt-4">
                    @csrf
                    @method('PUT')
                    <select name="status"
                        class="text-xs px-2 py-1 rounded-md border-gray-300 focus:border-primary-500 focus:ring-primary-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white"
                        onchange="this.form.submit()" @if(session('updated_id') == $item->id) disabled @endif>
                        <option value="terkirim" {{ old('status', $item->status) == 'terkirim' ? 'selected' : '' }}>Terkirim</option>
                        <option value="ditolak" {{ old('status', $item->status) == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                        <option value="diterima" {{ old('status', $item->status) == 'diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="dijadwalkan" {{ old('status', $item->status) == 'dijadwalkan' ? 'selected' : '' }}>Dijadwalkan</option>
                    </select>
                    <noscript>
                        <button type="submit"
                            class="text-xs px-3 py-1 rounded-md bg-primary-600 text-white hover:bg-primary-700 transition">
                            Ubah
                        </button>
                    </noscript>
                </form>
                @if(session('updated_id') == $item->id)
                    <span class="text-xs text-green-600 ml-2">Status berhasil diubah!</span>
                    <script>
                        setTimeout(function() {
                            window.location.reload();
                        }, 1500);
                    </script>
                @endif
            </li>
        @endforeach
    </ul>
</x-filament::card>
