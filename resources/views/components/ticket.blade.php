<div>
    <p class="text-bold text-blue-700 border p-2 m-3 rounded border-purple-400 inline-block">Tiket
        #{{ $ticket->ticket_number }}
    </p>
    <p class="text-bold text-blue-700 border p-2 m-3 rounded border-purple-400 inline-block bg-success">Nomor Telepon:
        {{ $ticket->phone }}</p>
    <p class="text-bold text-blue-700 border p-2 m-3 rounded border-purple-400 inline-block bg-success">Nama Lengkap:
        {{ $ticket->full_name }}</p>
    <p class="text-bold text-blue-700 border p-2 m-3 rounded border-purple-400 inline-block bg-success">Waktu Kedatangan:
        {{ $ticket->time_of_arrival }}</p>
    <p class="text-bold text-blue-700 border p-2 m-3 rounded border-purple-400 inline-block bg-success">Keperluan:
        <br>
        @foreach (json_decode($ticket->demands, true) as $demand)
            {{ $demand }}<br>
        @endforeach
    </p>
    <p class="text-bold text-blue-700 border p-2 m-3 rounded border-purple-400 inline-block bg-success">Total biaya:
        <br>
        @php
            $totalExpenses = 0;
        @endphp
        @foreach (json_decode($ticket->demands, true) as $demand)
        @if ($demand == '25000 = 20')
        @php $totalExpenses += 25000; @endphp
            @endif
        @if ($demand == 'dalam 20 menit = 50000')
        @php $totalExpenses += 50000; @endphp
        @endif
        @if ($demand == 'cuci 60 menit = 100000')
         @php $totalExpenses += 100000; @endphp
        @endif
        @endforeach


        <p>Total pengeluaran Anda adalah: {{ $totalExpenses }} rupiah.</p>
        <p class="text-bold text-blue-700 border p-2 m-3 rounded border-purple-400 inline-block bg-danger text-dark">Perhatian: Mohon simpan nomor kwitansi untuk tahap-tahap berikutnya.</p>
        {{ $slot }}
    </p>

    <div class="m-3">
        <x-link href="/ticket/{{ $ticket->id }}/edit" class="btn btn-outline-info text-dark rounded-lg px-3">
            Edit
        </x-link>
    </div>
    <div class="m-3">
        <form action="/ticket/{{ $ticket->id }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <x-submit class="btn btn-outline-info text-dark rounded-lg px-3">
                Hapus
            </x-submit>
        </form>
    </div>
</div>
