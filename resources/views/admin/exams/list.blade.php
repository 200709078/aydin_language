<x-app-layout>
    <x-slot name="header">LIST OF EXAMS</x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('exams.create') }}" class="btn btn-sm btn-primary">Create New Exam</a>
            </h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Exam</th>
                        <th scope="col">Status</th>
                        <th scope="col">Finihed At</th>
                        <th scope="col">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($exams as $exam)
                    <tr>
                        <th scope="row">{{ $exam->title }}</th>
                        <td>{{ $exam->status }}</td>
                        <td>{{ $exam->finished_at }}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-edit">Edit</i></a>
                            <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times">Del</i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $exams->links() }}
        </div>
    </div>
</x-app-layout>