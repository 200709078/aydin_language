<x-app-layout>
    <x-slot name="header">QUESTIONS LIST OF {{ $exam->title }}</x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('questions.create', $exam->id) }}" class="btn btn-sm btn-primary">Create New
                    Question</a>
            </h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">QUESTIONS</th>
                        <th scope="col">PHOTO</th>
                        <th scope="col">SELECT 1</th>
                        <th scope="col">SELECT 2</th>
                        <th scope="col">SELECT 3</th>
                        <th scope="col">SELECT 4</th>
                        <th scope="col">SELECT 5</th>
                        <th scope="col">CORRECT ANSWER</th>
                        <th scope="col">OPERATIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($exam->questions as $question)
                        <tr>
                            <th scope="row">{{ $question->question }}</th>
                            <td>{{ $question->image }}</td>
                            <td>{{ $question->select1 }}</td>
                            <td>{{ $question->select2 }}</td>
                            <td>{{ $question->select3 }}</td>
                            <td>{{ $question->select4 }}</td>
                            <td>{{ $question->select5 }}</td>
                            <td>{{ substr($question->correct_answer,-1) }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-edit">Edit</i></a>
                                <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times">Del</i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>