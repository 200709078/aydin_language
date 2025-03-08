<x-app-layout>
    <x-slot name="header">LIST OF EXAMS</x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('exams.create') }}" class="btn btn-sm btn-primary">Create New Exam</a>
            </h5>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">EXAM</th>
                        <th scope="col">NUMBER OF QUESTION</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">FINISHED AT</th>
                        <th scope="col">OPERATIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($exams as $exam)
                        <tr>
                            <th scope="row">{{ $exam->title }}</th>
                            <td>{{ $exam->questions_count}}</td>
                            <td>
                                @switch($exam->status)
                                    @case('publish')
                                        <span class="badge bg-success">Publish</span>
                                        @break
                                    @case('unpublish')
                                        <span class="badge bg-danger">Unpublish</span>
                                        @break
                                    @case('draft')
                                        <span class="badge bg-warning text-dark">Draft</span>
                                        @break
                                @endswitch
                            </td>
                            <td>
                                <span title="{{ $exam->finished_at }}">
                                    {{$exam->finished_at ? $exam->finished_at->diffForHumans():'-'}}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('questions.index', $exam->id) }}" class="btn btn-sm btn-warning"><i
                                        class="fa fa-edit">Add New Questions</i></a><br>
                                <a href="{{ route('exams.edit', $exam->id) }}" class="btn btn-sm btn-primary"><i
                                        class="fa fa-edit">Edit</i></a><br>
                                <a href="{{ route('exams.destroy', $exam->id) }}" class="btn btn-sm btn-danger"><i
                                        class="fa fa-times">Del</i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $exams->links() }}
        </div>
    </div>
</x-app-layout>