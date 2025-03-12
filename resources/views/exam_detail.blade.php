<x-app-layout>
    <x-slot name="header">DETAIL: {{ $exam->title }} </x-slot>
    <div class="card">
        <div class="card-body">
            <p class="card-text">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        @if ($exam->my_result)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Your Point: <span class="badge badge-socondary badge-pill"
                                    style="color:red;">{{$exam->my_result->point }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Correct Answers Number: <span class="badge badge-socondary badge-pill"
                                    style="color:red;">{{$exam->my_result->correct_number }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Wrong Answers Number: <span class="badge badge-socondary badge-pill"
                                    style="color:red;">{{$exam->my_result->wrong_number }}</span>
                            </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Soru Sayısı: <span class="badge badge-socondary badge-pill"
                                style="color:red;">{{ $exam->questions_count }}</span>
                        </li>
                        @if ($exam->finished_at)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Son Katılım Tarihi: <span title="{{ $exam->finished_at }}"
                                    class="badge badge-socondary badge-pill"
                                    style="color:red;">{{ $exam->finished_at->diffForHumans() }}</span>
                            </li>
                        @endif
                        @if ($exam->details)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Katılımcı Sayısı: <span class="badge badge-socondary badge-pill"
                                    style="color:red;">{{ $exam->details['join_count']}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Ortalama Puan: <span class="badge badge-socondary badge-pill"
                                    style="color:red;">{{ $exam->details['average']}}</span>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="col-md-8">
                    {{$exam->description}}
                    @if ($exam->my_result)
                    <a href="{{ route('exam.join', $exam->slug) }}" class="btn btn-warning btn-block btn-sm"
                    style="width: 100%;">See to Exam</a>
                    @else
                    <a href="{{ route('exam.join', $exam->slug) }}" class="btn btn-primary btn-block btn-sm"
                    style="width: 100%;">Join to Exam</a>
                    @endif
                </div>
            </div>
            </p>
        </div>
    </div>
</x-app-layout>