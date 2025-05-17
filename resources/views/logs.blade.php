<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Aktivitas - LendEase</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/Avatar.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link href="{{ mix('resources/css/app.css') }}" rel="stylesheet">
</head>
<body>
    @include('components.sidebar')

    <div class="sm:ml-64 bg-[#EEEEEE] pb-5">
        <div class="rounded-lg">
            <div class="flex flex-col items-start justify-start px-4 py-4 h-72 mb-4 bg-[#50790B]">
                <p class="text-md text-white">Pages / Log Aktivitas</p>
                <p class="text-lg font-bold text-white">Log Aktivitas</p>
            </div>
            <div class="flex flex-col justify-around gap-4 mx-10 -mt-36 mb-4 p-8 rounded-xl bg-white">
                <div class="flex flex-col gap-6 justify-start items-start p-8 lg:p-0">
                    <div class="flex justify-between w-full items-center">
                        <h1 class="text-2xl font-bold">History Aktivitas</h1>
                        <div class="flex gap-2">
                            <a href="{{ route('logs.export.excel') }}" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                Export Excel
                            </a>
                            <a href="{{ route('logs.export.pdf') }}" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                Export PDF
                            </a>
                        </div>
                    </div>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="p-4">No.</th>
                                <th scope="col" class="px-6 py-3">User</th>
                                <th scope="col" class="px-6 py-3">Barang</th>
                                <th scope="col" class="px-6 py-3">Aksi</th>
                                <th scope="col" class="px-6 py-3">Jumlah</th>
                                <th scope="col" class="px-6 py-3">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($logs as $log)
                            <tr class="bg-white border-b">
                                <td class="w-4 p-4">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4">{{ $log->user->name }}</td>
                                <td class="px-6 py-4">{{ $log->item->name }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 rounded-full text-sm
                                        {{ $log->action === 'borrow' ? 'bg-blue-100 text-blue-800' : '' }}
                                        {{ $log->action === 'return' ? 'bg-green-100 text-green-800' : '' }}">
                                        {{ ucfirst($log->action) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">{{ $log->amount }}</td>
                                <td class="px-6 py-4">{{ $log->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>
