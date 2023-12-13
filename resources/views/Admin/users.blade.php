@extends('admin.templates.layout')

@section('content')
<style>
    .dataTables_wrapper .dataTables_length select {
        border: 1px solid #aaa;
        border-radius: 3px;
        background-color: transparent;
        color: inherit;
        margin-bottom: 10px !important;
    }
    .dataTables_wrapper .dataTables_length select:not([size]) {
        padding-right: 2rem !important;
    }
    .dataTable_filter {
        margin-bottom: 10px !important;
    }
    a.paginate_button {
        width: ;
        border-radius: 10px !important;
    }
    table.dataTable td {
        border-bottom: 1px solid #ccc !important;
    }
</style>
<main class="min-h-screen bg-[#f3e3cf] p-4 md:ml-64 h-auto pt-20">
    <div class="shadow bg-white p-5 rounded-lg">
        <div class="mb-10">
            <h1 class="text-3xl font-semibold">Data Users</h1>
            <p>Manage Data Users</p>
        </div>
        <table class="border border-gray-400 rounded-lg overflow-hidden" id="dataTable">
            <thead class="bg-slate-800 text-white">
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection