@extends('layout.main')
@section('body')
    <div class="flex flex-col">
        <div class="w-full bg-purple-900 h-12 justify-center items-center flex">
            <h1 class="text-white  font-bold">Issue Page</h1>

        </div>
        <div class="flex flex-row space-x-10 p-4">
            {{-- {{$asset_issues}} --}}
            <div class="">
                <table class="table-auto w-[900px]  ">
                    <thead>
                        <tr class="space-x-10">
                            <th>Ticket</th>
                            <th>Date</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Serverity</th>
                            <th>Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($asset_issues as $issue)
                            <tr class="text-center border-b border-gray-200">
                                <td class="p-2">NCIT-{{ $issue->id }}-{{ 2025 }}</td>
                                <td class="p-2">{{ $issue->created_at->format('d-m-Y') }}</td>
                                <td class="p-2">{{ $issue->title }}</td>
                                <td class="p-2">{{ $issue->category }}</td>
                                <td class="p-2">{{ $issue->severity }}</td>
                                <td class="p-2">{{ $issue->status }}</td>
                                <td>
                                    <form method="POST" action="/issue/{{ $issue->id }}" class="inline">
                                        @csrf
                                        @method('put')
                                        <select name="status" id="status-{{ $issue->id }}" class="border border-gray-300 rounded-md p-1" onchange="this.form.submit()">
                                            <option value="" selected>Update Status</option>
                                            <option value="open">Open</option>
                                            <option value="in_progress">In Progress</option>
                                            <option value="resolved">Resolved</option>
                                            <option value="closed">Closed</option>
                                        </select>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        
@if (true)
      <div class="">
                <div class="flex-col">
                    <div class="">
                        <form method="POST" action="/issue" enctype="multipart/form-data">
                            @csrf

                            <label for="title">Title</label>
                            <input id="title" name="title" type="text"
                                class="border w-full border-gray-200 rounded-md">

                            <label for="assets" class="block text-sm font-medium text-gray-700">Assets:</label>
                            <select id="assets" name="assets"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                                <option value="" selected>please select ....</option>
                                @foreach ($assets as $asset)
                                    <option value="{{ $asset->id }}">{{ $asset->name }}</option>
                                @endforeach
                            </select>
                            <label for="category" class="block text-sm font-medium text-gray-700">Serverity:</label>
                            <select id="category" name="Serverity"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                                <option value="" selected>please select ....</option>
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                            <label for="category" class="block text-sm font-medium text-gray-700">Category:</label>
                            <select id="category" name="category"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                                <option value="" selected>please select ....</option>
                                <option value="Access">Access</option>
                                <option value="Hardware">Hardware</option>
                                <option value="Software">Software</option>
                            </select>

                            <label for="info" class="block text-sm font-medium text-gray-700">Issue</label>
                            <textarea id="info" name="info" cols="30" rows="10"
                                class="shadow-sm mt-1 block w-full border border-gray-100 rounded-2xl p-2"></textarea>

                            <button type="submit" class="bg-gray-500 m-4 p-2 text-white rounded-2xl w-full">send</button>
                        </form>


                    </div>
                </div>
            </div>
@endif
          
        </div>

    </div>
@endsection
